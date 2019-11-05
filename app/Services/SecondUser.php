<?php


namespace App\Services;

class SecondUser
{
    /**
     * @var CurrentUser
     */
    private $currentUser;

    public function __construct(NumberUser $currentUser)
    {
        $this->currentUser = $currentUser;
    }

    public function all()
    {
        $this->currentUser->setDisCount(200);
        return [
            'Name'=>'victor',
            'Address'=>'221,Baker B'
        ];
    }
}
