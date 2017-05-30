<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
//use Faker\Factory as Faker;
class UserSeeder extends Seeder {





	public function run()
	{
			User::create
			([
				'email'=>'correo@correo.com',
				'password'=>Hash::make('contra')
				]);
	
 }
}