<?php

use App\Models\CartModel;

if (!function_exists('countCart')) {
    function countCart()
    {
        $cartModel = new CartModel();
        $user_id = session()->get('id_customer'); 

        if (!$user_id) {
            return 0;
        }

        return $cartModel->where('user_id', $user_id)->countAllResults();
    }
}
