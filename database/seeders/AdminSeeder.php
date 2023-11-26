<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'username' => 'Staff1',
                'nama' => 'Togumanata Naipospos',
                'nomor_induk' => '1212022307930001',
                'email' => 'staff1@gmail.com',
                'password' => Hash::make('staff1'),
                'role_id' => '1',
            ],

            [
                'username' => 'Staff2',
                'nama' => 'Eva Viviana Pasaribu',
                'nomor_induk' => '1212114601900002',
                'email' => 'staff2@gmail.com',
                'password' => Hash::make('staff2'),
                'role_id' => '1',
            ],

            [
                'username' => 'Staff3',
                'nama' => 'Karolina Sitorus',
                'nomor_induk' => '1212074401990002',
                'email' => 'staff3@gmail.com',
                'password' => Hash::make('staff3'),
                'role_id' => '1',
            ],

            [
                'username' => 'Albert',
                'nama' => 'Albert Arta Danyoan Manik',
                'nomor_induk' => '11321016',
                'email' => 'albert@gmail.com',
                'password' => Hash::make('albert'),
                'role_id' => '2',
            ]
        );
        foreach ($data as $d) {
            User::create([
                'username' => $d['username'],
                'nama' => $d['nama'],
                'nomor_induk' => $d['nomor_induk'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role_id' => $d['role_id'],
            ]);
        }
    }
}
