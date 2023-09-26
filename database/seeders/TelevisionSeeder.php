<?php

namespace Database\Seeders;

use App\Models\Television;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Television::create([
            'name' => 'TV01',
            'tarif' => '5000'
        ]);

        Television::create([
            'name' => 'TV02',
            'tarif' => '5000'
        ]);

        Television::create([
            'name' => 'TV03',
            'tarif' => '5000'
        ]);

        Television::create([
            'name' => 'TV04',
            'tarif' => '5000'
        ]);

        Television::create([
            'name' => 'TV05',
            'tarif' => '5000'
        ]);
    }
}