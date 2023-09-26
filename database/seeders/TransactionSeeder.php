<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'name' => 'TV01',
            'tarif' => '5000'
        ]);

        Transaction::create([
            'name' => 'TV02',
            'tarif' => '5000'
        ]);

        Transaction::create([
            'name' => 'TV03',
            'tarif' => '5000'
        ]);

        Transaction::create([
            'name' => 'TV04',
            'tarif' => '5000'
        ]);

        Transaction::create([
            'name' => 'TV05',
            'tarif' => '5000'
        ]);
    }
}