<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function login() {

        $data = [
            'tittle' => 'Login',
        ];
        return view('auth/login', $data);
    }

}