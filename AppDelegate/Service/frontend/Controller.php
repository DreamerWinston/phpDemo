<?php

namespace AppDelegate\Service\frontend;


abstract class Controller extends \Main\Controller
{
    public function loadHtml($name, $data = array())
        {
            $this->s->assign($data);
            $this->s->display(PLATFORM . DS . $name . '.html');
        }
}