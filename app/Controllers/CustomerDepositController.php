<?php
namespace App\Controllers;

use App\Models\DepositModel;
use App\Models\BankModel;

class CustomerDepositController extends BaseController
{
    protected $depositModel;
    protected $session;
    protected $bankModel;

    public function __construct()
    {
        $this->depositModel = new DepositModel();
        $this->bankModel = new BankModel();
        
        // Pastikan hanya customer yang bisa akses
        if (session()->get('user_table') != 'customer') {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        $this->session = session();

        if (!$this->session->has('logged_in')) {
            return redirect()->to(base_url('login'))->with('alert','belum_login');
        }

        $data = [
            'deposits' => $this->depositModel->getDepositsByCustomer(session()->get('id_customer')),
            'banks' => $this->bankModel->findAll(),
            'activePage' => 'Deposit',
            'tittle' => 'Deposit Saya',
            'navigasi' => 'Deposit'
        ];
        
        return view('frontend/dashboard/deposit/index', $data);
    }

    public function create()
    {
        $data = [
            'banks' => $this->bankModel->findAll(),
            'activePage' => 'Deposit',
            'tittle' => 'Tambah Deposit',
            'navigasi' => 'Tambah Deposit'
        ];
        
        return view('frontend/dashboard/deposit/create', $data);
    }

    public function store()
    {
        $validation = $this->validate([
            'id_bank' => 'required|numeric',
            'jumlah_deposit' => 'required|numeric|greater_than[0]',
            'bukti_transfer' => 'uploaded[bukti_transfer]|max_size[bukti_transfer,2048]|is_image[bukti_transfer]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('bukti_transfer');
        $fileName = $file->getRandomName();
        $file->move('img_deposit', $fileName);

        $this->depositModel->save([
            'id_customer' => session()->get('id_customer'),
            'id_bank' => $this->request->getPost('id_bank'),
            'jumlah_deposit' => $this->request->getPost('jumlah_deposit'),
            'bukti_transfer' => 'img_deposit/' . $fileName,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('deposit')->with('success', 'Deposit berhasil diajukan!');
    }
}