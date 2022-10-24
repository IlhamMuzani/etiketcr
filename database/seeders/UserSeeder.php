<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => '1',
                'name' => 'admin',
                'role_id' => '1',
                'email' => 'admin@gmail.com',
                'phone' => '812345678901',
                'alamat' => 'Kota Tegal',
                'gambar' => 'user/admin1.png',
                'password' =>  bcrypt('admin')
            ],
            [
                'id' => '2',
                'role_id' => '2',
                'name' => 'Marzuki',
                'email' => 'marzuki@gmail.com',
                'phone' => '823456789012',
                'alamat' => 'Kota Tegal',
                'gambar' => 'user/marzuki.jpeg',
                'password' =>  bcrypt('marzuki')
            ],
            [
                'id' => '3',
                'role_id' => '2',
                'name' => 'Hanif',
                'email' => 'hanif@gmail.com',
                'phone' => '82345678090',
                'alamat' => 'Kota Tegal',
                'gambar' => 'user/hanif.png',
                'password' =>  bcrypt('hanif')
            ],
            [
                'id' => '4',
                'role_id' => '2',
                'name' => 'Anjani',
                'email' => 'anjani@gmail.com',
                'phone' => '823456789080',
                'alamat' => 'Kota Tegal',
                'gambar' => 'user/anjani.png',
                'password' => bcrypt('anjani')
            ],
        ];

        User::insert($users);
    }
}
