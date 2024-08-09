<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Ahmed Mohamed', 'email' => 'ahmed.mohamed@example.com', 'password' => bcrypt('password1'),
             'profile_picture' => 'images/profile1.jpg', 'phone_number' => '0123456789', 'address' => '123 Street, City'],
            ['name' => 'Fatima Ali', 'email' => 'fatima.ali@example.com', 'password' => bcrypt('password2'),
             'profile_picture' => 'images/profile2.jpg', 'phone_number' => '0987654321', 'address' => '456 Avenue, City'],
            ['name' => 'Mohamed Hassan', 'email' => 'mohamed.hassan@example.com', 'password' => bcrypt('password3'),
             'profile_picture' => 'images/profile3.jpg', 'phone_number' => '0112233445', 'address' => '789 Boulevard, City'],
            ['name' => 'Sara Ahmed', 'email' => 'sara.ahmed@example.com', 'password' => bcrypt('password4'),
             'profile_picture' => 'images/profile4.jpg', 'phone_number' => '0123456789', 'address' => '101 Road, City'],
            ['name' => 'Omar Abdel', 'email' => 'omar.abdel@example.com', 'password' => bcrypt('password5'),
             'profile_picture' => 'images/profile5.jpg', 'phone_number' => '0987654321', 'address' => '202 Lane, City'],
            ['name' => 'Mona Khaled', 'email' => 'mona.khaled@example.com', 'password' => bcrypt('password6'),
             'profile_picture' => 'images/profile6.jpg', 'phone_number' => '0112233445', 'address' => '303 Square, City'],
            ['name' => 'Youssef Ibrahim', 'email' => 'youssef.ibrahim@example.com', 'password' => bcrypt('password7'),
             'profile_picture' => 'images/profile7.jpg', 'phone_number' => '0123456789', 'address' => '404 Circle, City'],
            ['name' => 'Amina Mostafa', 'email' => 'amina.mostafa@example.com', 'password' => bcrypt('password8'),
             'profile_picture' => 'images/profile8.jpg', 'phone_number' => '0987654321', 'address' => '505 Place, City'],
            ['name' => 'Hassan El-Sayed', 'email' => 'hassan.elsayed@example.com', 'password' => bcrypt('password9'),
             'profile_picture' => 'images/profile9.jpg', 'phone_number' => '0112233445', 'address' => '606 Path, City'],
            ['name' => 'Layla Magdy', 'email' => 'layla.magdy@example.com', 'password' => bcrypt('password10'),
             'profile_picture' => 'images/profile10.jpg', 'phone_number' => '0123456789', 'address' => '707 Trail, City'],
            ['name' => 'Ali Fathy', 'email' => 'ali.fathy@example.com', 'password' => bcrypt('password11'),
             'profile_picture' => 'images/profile11.jpg', 'phone_number' => '0987654321', 'address' => '808 Route, City'],
            ['name' => 'Noha Youssef', 'email' => 'noha.youssef@example.com', 'password' => bcrypt('password12'),
             'profile_picture' => 'images/profile12.jpg', 'phone_number' => '0112233445', 'address' => '909 Highway, City'],
            ['name' => 'Tariq Mohamed', 'email' => 'tariq.mohamed@example.com', 'password' => bcrypt('password13'),
             'profile_picture' => 'images/profile13.jpg', 'phone_number' => '0123456789', 'address' => '1010 Drive, City'],
            ['name' => 'Hala Omar', 'email' => 'hala.omar@example.com', 'password' => bcrypt('password14'),
             'profile_picture' => 'images/profile14.jpg', 'phone_number' => '0987654321', 'address' => '1111 Avenue, City'],
            ['name' => 'Rami Tamer', 'email' => 'rami.tamer@example.com', 'password' => bcrypt('password15'),
             'profile_picture' => 'images/profile15.jpg', 'phone_number' => '0112233445', 'address' => '1212 Boulevard, City'],
            ['name' => 'Nadia Fawzy', 'email' => 'nadia.fawzy@example.com', 'password' => bcrypt('password16'),
             'profile_picture' => 'images/profile16.jpg', 'phone_number' => '0123456789', 'address' => '1313 Street, City'],
            ['name' => 'Samir Ayman', 'email' => 'samir.ayman@example.com', 'password' => bcrypt('password17'),
             'profile_picture' => 'images/profile17.jpg', 'phone_number' => '0987654321', 'address' => '1414 Lane, City'],
            ['name' => 'Heba Youssef', 'email' => 'heba.youssef@example.com', 'password' => bcrypt('password18'),
             'profile_picture' => 'images/profile18.jpg', 'phone_number' => '0112233445', 'address' => '1515 Place, City'],
            ['name' => 'Ibrahim Sherif', 'email' => 'ibrahim.sherif@example.com', 'password' => bcrypt('password19'),
             'profile_picture' => 'images/profile19.jpg', 'phone_number' => '0123456789', 'address' => '1616 Square, City'],
            ['name' => 'Rania Adel', 'email' => 'rania.adel@example.com', 'password' => bcrypt('password20'),
             'profile_picture' => 'images/profile20.jpg', 'phone_number' => '0987654321', 'address' => '1717 Trail, City'],
            ['name' => 'Mohamed Salah', 'email' => 'mohamed.salah@example.com', 'password' => bcrypt('password21'),
             'profile_picture' => 'images/profile21.jpg', 'phone_number' => '0112233445', 'address' => '1818 Route, City'],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
