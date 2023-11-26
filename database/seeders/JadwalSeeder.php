<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'user_id' => '1',
                'petugas' => 'dr. Togumanata Naipospos',
                'NIP'     => '1212022307930001',
                'hari'    => 'Senin - Jumat',
                'waktu'   => '14:00:00',
                'waktu2'  => '18:00:00'
            ],
            [
                'user_id' => '2',
                'petugas' => 'Zr. Eva Viviana Pasaribu',
                'NIP'     => '1212114601900002',
                'hari'    => 'Senin - Jumat',
                'waktu'   => '08:00:00',
                'waktu2'  => '15:30:00'
            ],
            [
                'user_id' => '3',
                'petugas' => 'Bd. Karolina Sitorus',
                'NIP'     => '1212074401990002',
                'hari'    => 'Senin - Jumat',
                'waktu'   => '13:30:00',
                'waktu2'  => '18:30:00'
            ],
        );

        foreach ($data as $d) {
            Jadwal::create([
                'user_id' => $d['user_id'],
                'petugas' => $d['petugas'],
                'NIP' => $d['NIP'],
                'hari' => $d['hari'],
                'waktu' => $d['waktu'],
                'waktu2' => $d['waktu2'],
            ]);
        }
    }
}
