<?php
declare(strict_types=1);
use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;

class HomeController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);
        $this->tag->setTitle(
            'Beranda'
        );
        parent::initialize();

        return $this->view;

    }

    public function indexAction()
    {
        return $this->view;

    }
    public function logoutAction(){
        $this->session->destroy();

        return $this->response->redirect('/');
    }

}

