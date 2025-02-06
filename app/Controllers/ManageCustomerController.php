<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class ManageCustomerController extends Controller
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel(); // Hanya menggunakan CustomerModel
    }

    // Menampilkan daftar customer
    public function index()
    {
        $data = [
            'customers' => $this->customerModel->findAll(), // Ambil semua data customer
            'activePage' => 'Manage Customer',
            'tittle' => 'Lapak Siswa | Kelola Customer',
            'navigasi' => 'Manage Customer Data'
        ];
        return view('backend/page/customer/manage-customer', $data);
    }

    // Menampilkan form untuk menambah customer
    public function create()
    {
        $data = [
            'activePage' => 'Manage Customer',
            'tittle' => 'Lapak Siswa | Customer',
            'navigasi' => 'Tambah Data Customer',
        ];

        return view('backend/page/customer/add-customer', $data);
    }

    // Menyimpan data customer baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'full_name' => 'required|min_length[3]',
            'username' => 'required|is_unique[customer.username]',
            'email' => 'required|valid_email|is_unique[customer.email]',
            'password' => 'required|min_length[6]',
            'no_telp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'saldo' => 'required|numeric',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save customer data
        $this->customerModel->save([
            'id_level' => 2, // Set level otomatis menjadi 2 (customer)
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telp' => $this->request->getPost('no_telp'),
            'gender' => $this->request->getPost('gender'),
            'alamat' => $this->request->getPost('alamat'),
            'saldo' => $this->request->getPost('saldo'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/manage-customer')->with('success', 'Customer created successfully');
    }

    // Menampilkan form untuk mengedit customer
    public function edit($id)
    {
        $data = [
            'customer' => $this->customerModel->find($id),
            'activePage' => 'Manage Customer',
            'tittle' => 'Lapak Siswa | Edit Customer',
            'navigasi' => 'Edit Data Customer'
        ];
        return view('backend/page/customer/edit-customer', $data);
    }

    // Memperbarui data customer
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'full_name' => 'min_length[3]',
            'username' => "min_length[5]|is_unique[customer.username,id_customer,{$id}]",
            'email' => "valid_email|min_length[6]|is_unique[customer.email,id_customer,{$id}]",
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data customer yang ada
        $customerData = $this->customerModel->find($id);
        $dataToUpdate = [];

        // Cek dan tambahkan field yang diubah
        if ($this->request->getPost('full_name')) {
            $dataToUpdate['full_name'] = $this->request->getPost('full_name');
        }
        if ($this->request->getPost('username')) {
            $dataToUpdate['username'] = $this->request->getPost('username');
        }
        if ($this->request->getPost('email')) {
            $dataToUpdate['email'] = $this->request->getPost('email');
        }
        if ($this->request->getPost('no_telp')) {
            $dataToUpdate['no_telp'] = $this->request->getPost('no_telp');
        }
        if ($this->request->getPost('gender')) {
            $dataToUpdate['gender'] = $this->request->getPost('gender');
        }
        if ($this->request->getPost('alamat')) {
            $dataToUpdate['alamat'] = $this->request->getPost('alamat');
        }
        if ($this->request->getPost('saldo')) {
            $dataToUpdate['saldo'] = $this->request->getPost('saldo');
        }
        // Cek jika ada password baru yang diinput
        if ($this->request->getPost('password')) {
            $dataToUpdate['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Update customer data
        $this->customerModel->update($id, $dataToUpdate + ['updated_at' => date('Y-m-d H:i:s')]);

        $fullName = $this->request->getPost('full_name') ?: $customerData['full_name'];
        return redirect()->to('/manage-customer')->with('success', "Customer '{$fullName}' Updated successfully");
    }

    // Menghapus customer
    public function delete($id)
    {
        // Hapus customer dari database
        $this->customerModel->delete($id);
        return redirect()->to('/manage-customer')->with('success', 'Customer deleted successfully');
    }
}