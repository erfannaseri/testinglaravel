<?php
namespace App\Services;

use Str;

class CurrentUser implements NumberUser
{
    private $currency;
    private $disCount;

    public function __construct($currency)
    {
        $this->currency=$currency;
    }
    public function setDisCount($amount)
    {
        $this->disCount=$amount;
    }

    public function show($charge){
        return [
            $charge-$this->disCount,
            $this->currency,
            str::random(40),
            $this->disCount
            ];
    }
}
