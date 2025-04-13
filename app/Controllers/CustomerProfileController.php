<?php
namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerProfileController extends BaseController
{
    protected $customerModel;
    protected $session;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        
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
            'activePage' => 'Profile',
            'tittle' => 'Pengaturan Profil',
            'navigasi' => 'Pengaturan Profil'
        ];
        
        return view('frontend/dashboard/profile-customer', $data);
    }

    public function update()
{
    $validationRules = [
        'full_name' => 'required|min_length[3]',
        'username' => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'no_telp' => 'required',
        'gender' => 'required|in_list[male,female]',
        'alamat' => 'required',
        'password' => 'permit_empty|min_length[6]',
        'photo' => 'if_exist|uploaded[photo]|max_size[photo,2048]|is_image[photo]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $customerId = session()->get('id_customer');
    $postData = $this->request->getPost();
    $file = $this->request->getFile('photo');

    // Handle file upload
    $newPhotoPath = null;
    if ($file && $file->isValid()) {
        // Hapus file lama jika ada
        $oldPhoto = $this->customerModel->find($customerId)['url_image'];
        if ($oldPhoto && file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }
        
        // Upload file baru
        $newName = $file->getRandomName();
        $file->move('img_user', $newName);
        $newPhotoPath = 'img_user/' . $newName;
        $postData['url_image'] = $newPhotoPath;
    }

    // Update data
    if ($this->customerModel->updateProfile($customerId, $postData)) {
        // Dapatkan data terbaru dari database
        $updatedCustomer = $this->customerModel->find($customerId);
        
        // Update semua data session
        $sessionData = [
            'fullname' => $updatedCustomer['full_name'],
            'username' => $updatedCustomer['username'],
            'email' => $updatedCustomer['email'],
            'gender' => $updatedCustomer['gender'],
            'url_image' => $updatedCustomer['url_image'],
            'no_telp' => $updatedCustomer['no_telp'],
            'alamat' => $updatedCustomer['alamat']
        ];
        
        session()->set($sessionData);
        
        // Redirect dengan pesan sukses dan force refresh
        return redirect()->to('profile')
            ->with('success', 'Profil berhasil diperbarui!')
            ->with('refresh', true); // Tambahkan flag refresh
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil');
    }
}

    private function updateSessionData($customerId)
    {
        $customer = $this->customerModel->find($customerId);
        
        $sessionData = [
            'fullname' => $customer['full_name'],
            'username' => $customer['username'],
            'email' => $customer['email'],
            'gender' => $customer['gender'],
            'no_telp' => $customer['no_telp'],
            'alamat' => $customer['alamat'],
            'url_image' => $customer['url_image']
        ];
        
        session()->set($sessionData);
    }
}