<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
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
                'role_name' => 'Staff',
            ],
            [
                'role_name' => 'Mahasiswa',
            ],
        );
        foreach ($data as $d) {
            Role::create([
                'role_name' => $d['role_name'],
            ]);
        }
    }
}
