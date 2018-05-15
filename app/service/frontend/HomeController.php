<?php

namespace  app\service\frontend;


//use \Main\Controller;

use app\service\frontend\Controller;

class HomeController extends Controller{

    public function index()
    {
        $this->loadHtml('home/index',array(
        ));
    }


}
