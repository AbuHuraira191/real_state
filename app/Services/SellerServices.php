<?php

namespace App\Services;

use App\Models\Seller;

class SellerServices{

    public function addProperty($data){
//        dd($data->all());

        try {
            $res = Seller::updateOrCreate([
                'email' => $data['email']
            ], [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'password' => $data['password'],
                'about' => $data['about'],
                'address' => $data['address'],
            ]);

            session()->put('role', $data['role']);
            session()->put('email', $data['email']);

            return true;
        }catch (\Exception $e){
            return false;
        }
    }
}
