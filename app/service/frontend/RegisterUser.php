<?php

namespace app\service\frontend;

use app\model\UserModel;

class RegisterUser extends \main\Controller
{
    public function register()
    {
        $this->loadHtml('home/register',array(

        ));
    }

}