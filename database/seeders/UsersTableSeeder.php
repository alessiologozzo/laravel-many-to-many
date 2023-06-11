<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = config("dbseeder.users");

        foreach($users as $user){
            $newUser = new User();
            $newUser->name = $user["name"];
            $newUser->email = $user["email"];
            $newUser->password = Hash::make($user["password"]);
            $newUser->save();
        }
    }
}
