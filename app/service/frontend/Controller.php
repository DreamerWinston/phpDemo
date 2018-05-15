<?php

namespace app\service\frontend;


abstract class Controller extends \main\Controller
{
    public function loadHtml($name, $data = array())
        {
            $this->s->assign($data);
            $this->s->display(PLATFORM . DS . $name . '.html');
        }
}