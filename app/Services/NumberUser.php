<?php

namespace App\Services;

interface NumberUser
{
    public function setDisCount($amount);

    public function show($charge);
}
