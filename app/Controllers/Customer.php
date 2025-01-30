<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function index() {
        $data['title'] = 'dashboard';
        return view('backend/page/dashboard', $data);
    }

}
