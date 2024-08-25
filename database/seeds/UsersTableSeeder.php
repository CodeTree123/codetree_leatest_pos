<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use app\Admin;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Admin::create([
           'first_name'=>'Codetree',
           'last_name'=>'admin', 
           'email'=>'admin@gmail.com',
           'mobile'=>'32130',
           'username'=>'admin',
           'password'=>Hash::make(rootadmin), 
           'image'=>'public/uploads/profile_image/icon-5359553_1280.webp',
           'role'=>1,
           'status'=>1,
           ]);
    }
}
