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
        'role' => 'admin',
        'curp' => '12345678912345678'
      ]);
    }
}
