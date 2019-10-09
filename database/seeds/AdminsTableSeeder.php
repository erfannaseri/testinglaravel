<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'name'       =>  'Erfan',
           'email'      =>  'er9.naseri@gmail.com',
           'password'   =>bcrypt('123456'),
        ]);
    }
}
