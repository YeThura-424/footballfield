<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
    	$admin = User::create([
    		'name'=> 'Rathan',
    		'profile'=>'image/user/admin.png',
    		'email'=>'admin@gmail.com',
    		'password'=>Hash::make('123456789'),
    		'phone' =>'0987654321',
    		'address'=>'Yangon'
    	]);
    	$admin->assignRole('admin');

    	$customer = User::create([
    		'name'=> 'Yethura',
    		'profile'=>'image/user/customer.png',
    		'email'=>'customer@gmail.com',
    		'password'=>Hash::make('123456789'),
    		'phone' =>'0987654321',
    		'address'=>'Yangon'
    	]);
    	$customer->assignRole('customer');

    }
}
