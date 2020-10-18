<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
      'name' => 'Bunyod Khakimov',
      'email'=> 'b.khakimov@student.inha.uz',
      'password' => bcrypt('password')
      ]);

      User::create([
      'name' => 'Sevara Babajanova',
      'email'=> 's.babajanova@student.inha.uz',
      'password' => bcrypt('password')
      ]);

      User::create([
      'name' => 'Kamrom Sarimov',
      'email'=> 'k.karimov@student.inha.uz',
      'password' => bcrypt('password')
      ]);
    }
}
