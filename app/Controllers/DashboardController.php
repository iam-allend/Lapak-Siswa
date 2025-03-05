<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    

    public function dashboard() {
        $data = [
            // 'admins' => $this->adminModel->findAll(),
            'activePage' => 'Dashboard',
            'tittle' => 'Lapak Siswa | Dashboard',
            // 'navigasi' => 'Edit Admin Data'
        ];
        return view('frontend/dashboard/profilenew', $data);
    }

}
