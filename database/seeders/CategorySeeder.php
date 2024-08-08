<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Rice Pudding'],
            ['name' => 'Qashtouta'],
            ['name' => 'Ice Cream'],
            ['name' => 'Om Ali'],
            ['name' => 'Koshary'],
            ['name' => 'Cassata'],
            ['name' => 'Salankate'],
            ['name' => 'Creme Brulee'],
            ['name' => 'Extras'],
        ]);
    }
}
