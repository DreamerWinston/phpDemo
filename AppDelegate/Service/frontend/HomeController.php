<?php

namespace  AppDelegtate\Service\frontend;


use \Main\Controller;

//use AppDelegate\Service\frontend\Controller;

class HomeController extends Controller{

    public function index()
    {
        $this->loadHtml('home/index',array(
        ));
    }


}
