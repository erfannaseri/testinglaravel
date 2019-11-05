<?php

namespace App\Http\Controllers;

use App\Services\CurrentUser;
use App\Services\NumberUser;
use App\Services\SecondUser;
use Illuminate\Http\Request;

class TestServiceContainer extends Controller
{
    public function getBack(SecondUser $secondUser,NumberUser $currentUser)
    {
        $secondUser->all();
        dd($currentUser->show(2000));
    }
}
