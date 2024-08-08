<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Ahmed Mohamed', 'email' => 'ahmed.mohamed@example.com', 'password' => bcrypt('password1')],
            ['name' => 'Fatima Ali', 'email' => 'fatima.ali@example.com', 'password' => bcrypt('password2')],
            ['name' => 'Mohamed Hassan', 'email' => 'mohamed.hassan@example.com', 'password' => bcrypt('password3')],
            ['name' => 'Sara Ahmed', 'email' => 'sara.ahmed@example.com', 'password' => bcrypt('password4')],
            ['name' => 'Omar Abdel', 'email' => 'omar.abdel@example.com', 'password' => bcrypt('password5')],
            ['name' => 'Mona Khaled', 'email' => 'mona.khaled@example.com', 'password' => bcrypt('password6')],
            ['name' => 'Youssef Ibrahim', 'email' => 'youssef.ibrahim@example.com', 'password' => bcrypt('password7')],
            ['name' => 'Amina Mostafa', 'email' => 'amina.mostafa@example.com', 'password' => bcrypt('password8')],
            ['name' => 'Hassan El-Sayed', 'email' => 'hassan.elsayed@example.com', 'password' => bcrypt('password9')],
            ['name' => 'Layla Magdy', 'email' => 'layla.magdy@example.com', 'password' => bcrypt('password10')],
            ['name' => 'Ali Fathy', 'email' => 'ali.fathy@example.com', 'password' => bcrypt('password11')],
            ['name' => 'Noha Youssef', 'email' => 'noha.youssef@example.com', 'password' => bcrypt('password12')],
            ['name' => 'Tariq Mohamed', 'email' => 'tariq.mohamed@example.com', 'password' => bcrypt('password13')],
            ['name' => 'Hala Omar', 'email' => 'hala.omar@example.com', 'password' => bcrypt('password14')],
            ['name' => 'Rami Tamer', 'email' => 'rami.tamer@example.com', 'password' => bcrypt('password15')],
            ['name' => 'Nadia Fawzy', 'email' => 'nadia.fawzy@example.com', 'password' => bcrypt('password16')],
            ['name' => 'Samir Ayman', 'email' => 'samir.ayman@example.com', 'password' => bcrypt('password17')],
            ['name' => 'Heba Youssef', 'email' => 'heba.youssef@example.com', 'password' => bcrypt('password18')],
            ['name' => 'Ibrahim Sherif', 'email' => 'ibrahim.sherif@example.com', 'password' => bcrypt('password19')],
            ['name' => 'Rania Adel', 'email' => 'rania.adel@example.com', 'password' => bcrypt('password20')],
            ['name' => 'Mohamed Salah', 'email' => 'mohamed.salah@example.com', 'password' => bcrypt('password21')],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
