<?php
namespace App\Controllers;

use App\Models\DepositModel;
use App\Models\CustomerModel;
use App\Models\BankModel;
use CodeIgniter\Controller;



class ManageDepositController extends Controller
{
    protected $depositModel;
    protected $customerModel;
    protected $session;
    protected $bankModel;

    public function __construct()
    {
        $this->depositModel = new DepositModel();
        $this->customerModel = new CustomerModel();
        $this->bankModel = new BankModel();
    }

    // Tampilkan semua deposit
    public function index()
    {
        $this->session = session();

        if (!$this->session->has('logged_in')) {
            return redirect()->to(base_url('login'))->with('alert','belum_login');
        }

        $data = [
            'deposits' => $this->depositModel->getDepositWithDetails(),
            'activePage' => 'Manage Deposit',
            'tittle' => 'Lapak Siswa | Kelola Deposit',
            'navigasi' => 'Manage Deposit'
        ];
        return view('backend/page/deposit/manage-deposit', $data);
    }

    // Form tambah deposit
    public function create()
    {
        $data = [
            'customers' => $this->customerModel->findAll(),
            'banks' => $this->bankModel->findAll(),
            'activePage' => 'Manage Deposit',
            'tittle' => 'Tambah Deposit',
            'navigasi' => 'Tambah Deposit'
        ];
        return view('backend/page/deposit/add-deposit', $data);
    }

    public function store(){

        $validationRules = [
            'id_customer' => 'required|numeric',
            'id_bank' => 'required|numeric',
            'jumlah_deposit' => 'required|numeric|greater_than[0]',
            'bukti_transfer' => 'uploaded[bukti_transfer]|max_size[bukti_transfer,2048]|is_image[bukti_transfer]',
            'status' => 'required|in_list[pending,success]',
            'saldo_masuk' => 'permit_empty|numeric'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $file = $this->request->getFile('bukti_transfer');
        $fileName = $file->getRandomName();
        $file->move('img_deposit', $fileName);

        $postData = $this->request->getPost();
        $postData['bukti_transfer'] = 'img_deposit/' . $fileName;
        $postData['saldo_masuk'] = ($postData['status'] == 'success') ? $postData['saldo_masuk'] : null;

        // Save data
        if ($this->depositModel->save($postData)) {
            // Update saldo if status is success
            if ($postData['status'] == 'success') {
                $this->updateCustomerSaldo($postData['id_customer'], $postData['saldo_masuk']);
            }
            return redirect()->to('/manage-deposit')->with('success', 'Deposit berhasil dibuat!');
        } else {
            // Delete uploaded file if save failed
            @unlink('img_deposit/' . $fileName);
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan deposit');
        }
    }

    // Form edit deposit
    public function edit($id)
    {
        $data = [
            'deposit' => $this->depositModel->find($id),
            'customers' => $this->customerModel->findAll(),
            'banks' => $this->bankModel->findAll(),
            'activePage' => 'Manage Deposit',
            'tittle' => 'Edit Deposit',
            'navigasi' => 'Edit Deposit'
        ];
        return view('backend/page/deposit/edit-deposit', $data);
    }
    
    public function update($id)
    {
        $validationRules = [
            'id_customer' => 'required|numeric',
            'id_bank' => 'required|numeric',
            'jumlah_deposit' => 'required|numeric|greater_than[0]',
            'status' => 'required|in_list[pending,success]',
            'saldo_masuk' => 'permit_empty|numeric',
            'bukti_transfer' => 'if_exist|uploaded[bukti_transfer]|max_size[bukti_transfer,2048]|is_image[bukti_transfer]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $deposit = $this->depositModel->find($id);
        if (!$deposit) {
            return redirect()->to('/manage-deposit')->with('error', 'Deposit tidak ditemukan');
        }

        $postData = $this->request->getPost();
        $file = $this->request->getFile('bukti_transfer');

        // Handle file upload if new file is uploaded
        if ($file && $file->isValid()) {
            // Delete old file if exists
            if ($deposit['bukti_transfer'] && file_exists($deposit['bukti_transfer'])) {
                unlink($deposit['bukti_transfer']);
            }
            
            // Upload new file
            $newFileName = $file->getRandomName();
            $file->move('img_deposit', $newFileName);
            $postData['bukti_transfer'] = 'img_deposit/' . $newFileName;
        } else {
            // Keep old file if no new upload
            $postData['bukti_transfer'] = $deposit['bukti_transfer'];
        }

        // Handle status and balance changes
        if ($postData['status'] == 'success') {
            if (empty($postData['saldo_masuk'])) {
                return redirect()->back()->withInput()->with('errors', ['saldo_masuk' => 'Saldo masuk wajib diisi untuk status success']);
            }

            // Revert old balance if previously success
            if ($deposit['status'] == 'success') {
                $this->updateCustomerSaldo($deposit['id_customer'], -$deposit['saldo_masuk']);
            }
            
            // Add new balance
            $this->updateCustomerSaldo($postData['id_customer'], $postData['saldo_masuk']);
        } else {
            // Revert balance if changing from success to pending
            if ($deposit['status'] == 'success') {
                $this->updateCustomerSaldo($deposit['id_customer'], -$deposit['saldo_masuk']);
            }
            $postData['saldo_masuk'] = null;
        }

        // Update data
        if ($this->depositModel->update($id, $postData)) {
            return redirect()->to('/manage-deposit')->with('success', 'Deposit berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui deposit');
        }
    }

    // Hapus deposit
    public function delete($id)
    {
        $deposit = $this->depositModel->find($id);
        
        if ($deposit['status'] == 'success') {
            $this->updateCustomerSaldo($deposit['id_customer'], -$deposit['saldo_masuk']);
        }
        
        // Hapus file bukti transfer
        if ($deposit['bukti_transfer'] && file_exists($deposit['bukti_transfer'])) {
            unlink($deposit['bukti_transfer']);
        }
        
        $this->depositModel->delete($id);
        return redirect()->to('/manage-deposit')->with('success', 'Deposit berhasil dihapus!');
    }

    private function updateCustomerSaldo($customerId, $amount)
    {
        $customer = $this->customerModel->find($customerId);
        $newSaldo = $customer['saldo'] + $amount;
        $this->customerModel->update($customerId, ['saldo' => $newSaldo]);
    }
}