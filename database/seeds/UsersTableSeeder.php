<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\factory::create();
        for ($i=0;$i<=10;$i++){
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->safeEmail,
                'email_verified_at'=>now(),
                'password'=>str::random(64),
                'remember_token'=>str::random(10)
            ]);
        }
    }
}
