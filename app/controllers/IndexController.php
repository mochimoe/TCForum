<?php
declare(strict_types=1);
use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);

    }

    public function indexAction()
    {

    }

}

