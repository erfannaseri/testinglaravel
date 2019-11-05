<?php
namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class TestFacade extends Facade
{


    protected static function getFacadeAccessor()
    {
       return 'TestFacade';
    }
}
