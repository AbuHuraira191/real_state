<?php

namespace App\Services;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Dealer;
use Illuminate\Support\Facades\Route;

class UserServices{

    public function signup($data){

        $modelClass = $this->getTableForRole($data['role']);
        $table = new $modelClass();

        try {
            $res = $table->updateOrCreate([
                'email' => $data['email']
            ], [
                'name' => $data['name'],
                'phone' => $data['phone'],
//                'password' => bcrypt($data['password']),
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

    public function getTableForRole($role)
    {
        // Map the role to the respective table name
        $modelClasses = [
            'buyer' => Buyer::class,
            'dealer' => Dealer::class,
            'seller' => Seller::class,
        ];

        return $modelClasses[$role] ?? null;
    }
}
