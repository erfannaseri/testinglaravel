<?php
namespace App\Services;

use Str;

class TestFacade
{
    public function randomString()
    {
        return Str::random(40);
    }
}
