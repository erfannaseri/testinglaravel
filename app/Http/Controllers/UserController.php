<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete()
    {
       User::where('id','<',53)->delete();
        return view('welcome');
    }
}
