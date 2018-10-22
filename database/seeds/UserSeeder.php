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
        'name' => 'Administradore',
        'email' => 'admin@mail.com',
        'password' => bcrypt('secret'),
        'avatar' => 'none',
        'role' => 'admin'
      ]);
      User::create([
        'name' => 'Dr. Eduardo Ejemplo',
        'email' => 'primero@mail.com',
        'password' => bcrypt('secret'),
        'avatar' => 'none',
        'role' => 'doctor'
      ]);
      User::create([
        'name' => 'Dra. Maria Ejemplo',
        'email' => 'segundo@mail.com',
        'password' => bcrypt('secret'),
        'avatar' => 'none',
        'role' => 'doctor'
      ]);
    }
}
