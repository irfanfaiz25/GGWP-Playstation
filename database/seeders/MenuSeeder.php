<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'nama_menu' => 'Teh Panas',
            'harga' => '2500',
            'jenis' => 'minuman'
        ]);

        Menu::create([
            'nama_menu' => 'Es Teh',
            'harga' => '3000',
            'jenis' => 'minuman'
        ]);

        Menu::create([
            'nama_menu' => 'Goodday Panas/Es',
            'harga' => '3000',
            'jenis' => 'minuman'
        ]);

        Menu::create([
            'nama_menu' => 'Tempe',
            'harga' => '1000',
            'jenis' => 'makanan'
        ]);

        Menu::create([
            'nama_menu' => 'Tahu',
            'harga' => '1000',
            'jenis' => 'makanan'
        ]);
    }
}