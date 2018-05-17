<?php

namespace  app\service\frontend;

use app\model\UserModel;

class HomeController extends Controller{

    public function index()
    {
        $this->loadHtml('home/index',array(
        ));
    }


}
