<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Alex Tang';
        $user->email = 'alex@gmail.com';
        $user->password = '111111';
        $user->save();
    }
}
