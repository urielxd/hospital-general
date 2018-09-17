<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Eduardo',
        'email' => 'primero@mail.com',
        'password' => bcrypt('secret'),
        'avatar' => 'none',
        'role' => 'doctor'
      ]);
      User::create([
        'name' => 'Maria',
        'email' => 'segundo@mail.com',
        'password' => bcrypt('secret'),
        'avatar' => 'none',
        'role' => 'doctor'
      ]);
    }
}
