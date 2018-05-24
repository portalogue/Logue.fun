<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => "Admin Logue",
          'email' => 'admin@logue.fun',
          'password' => bcrypt("tryh4rd#2017"),
          'gender' => 'Male',
          'birthday' => '1990-09-09',
          'phone' => '0812519923',
          'address' => 'Jl. Telekomunikasi, Bandung',
          'photo' => 'avatars/default.png',
          'role' => 'Admin',
        ]);
    }
}
