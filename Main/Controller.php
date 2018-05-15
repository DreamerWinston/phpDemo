<?php

namespace Main;

use vendor\Smarty;

abstract class Controller
{
    protected $s;

    protected function initSmarty()
    {
        $s =new Smarty();


    }

}