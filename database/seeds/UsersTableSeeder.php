<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_list=array(
            array(
                'name'=>'Admin User',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin@1234'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'vendor User',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('vendor@1234'),
                'role'=>'vendor',
                'status'=>'active'
            ),
            array(
                'name'=>'customer User',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('customer@1234'),
                'role'=>'customer',
                'status'=>'active'
            )
        );
        $user=new User();
        foreach($users_list as $data){
                $user->fill($data);
                $user->save();


        }
    }
}
