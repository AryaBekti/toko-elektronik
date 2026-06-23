<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Laptop',     'deskripsi' => 'Komputer portabel'],
            ['nama_kategori' => 'Aksesoris',  'deskripsi' => 'Peripheral komputer'],
            ['nama_kategori' => 'Monitor',    'deskripsi' => 'Layar komputer'],
            ['nama_kategori' => 'Networking', 'deskripsi' => 'Perangkat jaringan'],
        ];
        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
