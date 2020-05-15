<?php
declare(strict_types=1);
use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;

class SignupController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);
        $this->tag->setTitle(
            'Laman Daftar'
        );
        parent::initialize();

    }

    public function indexAction()
    {


    }
    public function registAction()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "insert into dbo.Users values ('".$nama."', '".$email."' , '".$password."')";
        $db = $this->getDI()->get('db');

        $result = $db->execute($sql);

        //echo ($sql);
        $this->flash->success(
            'Akun berhasil dibuat, silahkan login'
        );

        return $this->dispatcher->forward(
            [
                'controller' => 'session',
                'action'     => 'index',
            ]
        );
       

    }

}

