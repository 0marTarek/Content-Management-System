<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $user = User::all()->where('email','omartarek@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name' => 'omartarek',
                'email' =>'omartarek@gmail.com',
                'password' =>Hash::make('123456'),
                'role' =>'admin'
            ]);
        }
    }
}
