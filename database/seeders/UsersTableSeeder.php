<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            [
                'id'             => '1',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

      
        
        User::insert($accounts);
       
        
    }
}
