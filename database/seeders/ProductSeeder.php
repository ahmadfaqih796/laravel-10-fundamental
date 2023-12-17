<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfProducts = 20;

        for ($i = 0; $i < $numberOfProducts; $i++) {
            DB::table('products')->insert([
                'name' => $this->getRandomProductName(),
                'detail' => Str::random(10) . ' lorem ipsum dolor',
                'created_at' => now(),
            ]);
        }
    }

    private function getRandomProductName(): string
    {
        $products = ['apel', 'pisang', 'tomat', 'jeruk', 'melon', 'mangga', 'stroberi', 'anggur', 'nanas', 'kiwi'];

        return $products[array_rand($products)];
    }
}
