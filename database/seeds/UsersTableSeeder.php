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
        User::truncate();

        $user = new User;
        $user->name = "Fernando Ropero";
        $user->email = "fernandojoseropero@gmail.com";
        $user->password = bcrypt('system2010');
        $user->save();
    }
}
