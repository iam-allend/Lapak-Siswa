<?php

namespace App\Controllers;

class LayOutController extends BaseController
{
    

    public function dashboard() {
        $data['activePage'] = 'dashboard';
        return view('backend/page/dashboard', $data);
    }
    
    public function card() {
        $data['activePage'] = 'Manage Admin';
        return view('backend/page/manage-admin', $data);
    }

}
