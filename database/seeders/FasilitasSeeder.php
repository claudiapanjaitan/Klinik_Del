<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;

class FasilitasSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Patung',
            //     'deskripsi'  => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos animi excepturi, tenetur labore alias neque molestias quas amet vitae exercitationem architecto recusandae! Temporibus odit sint enim beatae omnis velit totam.',
            //     'gambar'     => 'gambar1.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Alas',
            //     'deskripsi'  => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos animi excepturi, tenetur labore alias neque molestias quas amet vitae exercitationem architecto recusandae! Temporibus odit sint enim beatae omnis velit totam.',
            //     'gambar'     => 'gambar2.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Foto',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar3.jpeg'
            // ],
            [
                'user_id'    => '1',
                'nama'       => 'Wastafel',
                'deskripsi'  => 'Fasilitas dalam klinik Del juga terdapat wastafel yang dapat digunakan pasien dan klinik staff agar tidak perlu mencuci tangan di toilet.',
                'gambar'     => 'gambar4.jpeg'
            ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Berkas',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar5.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Ruang Laktasi',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar6.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Info BPJS',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar7.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Info JKN',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar8.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Poster BPJS',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar9.jpeg'
            // ],
            [
                'user_id'    => '1',
                'nama'       => 'Toilet',
                'deskripsi'  => 'Fasilitas dalam klinik Del juga terdapat toilet yang bisa digunakan untuk pasien dan juga staff klinik.',
                'gambar'     => 'gambar10.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Timbangan',
                'deskripsi'  => 'Fasilitas dalam klinik Del juga terdapat timbangan untuk pasien yang ingin memeriksa berat badannya.',
                'gambar'     => 'gambar11.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Kursi',
                'deskripsi'  => 'Klinik Del juga dilengkapi banyak kursi yang cukup untuk pasien yang ingin melakukan konsultasi.',
                'gambar'     => 'gambar12.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Test Chart',
                'deskripsi'  => 'Alat ini ditempelkan di pintu kaca, yang berfungsi untuk tes mata yang mengalami rabun jauh.',
                'gambar'     => 'gambar13.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Ruangan',
                'deskripsi'  => 'Ruangan yang berada di dalam klinik Del terdapat lemari yang berisi obat-obat an dan perlatan medis lainnya',
                'gambar'     => 'gambar14.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Ruangan 2',
                'deskripsi'  => 'Ruangan yang berada di dalam klinik Del yang merupakan tempat dokter melakukan konsultasi Bersama pasien, yang terdapat meja kerja.',
                'gambar'     => 'gambar15.jpeg'
            ],
            [
                'user_id'    => '1',
                'nama'       => 'Ruangan 3',
                'deskripsi'  => 'Ruangan ini merupakan bagian dari klinik Del yang merupakan ruang konsultasi, yang di dalamnya terdapat AC sebagai penyejuk ruangan, kulkas, serta lemari obat.',
                'gambar'     => 'gambar16.jpeg'
            ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Ruangan 4',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar17.jpeg'
            // ],
            // [
            //     'user_id'    => '1',
            //     'nama'       => 'Reccepsionist',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar18.jpeg'
            // ],
            // [
            //     'user_id'     => '1',
            //     'nama'       => 'Klinik',
            //     'deskripsi'  => 'tes',
            //     'gambar'     => 'gambar19.jpeg'
            // ],
        );

        foreach ($data as $d) {
            Clinic::create([
                'user_id' => $d['user_id'],
                'nama' => $d['nama'],
                'deskripsi' => $d['deskripsi'],
                'gambar' => $d['gambar']
            ]);
        }
    }
}
