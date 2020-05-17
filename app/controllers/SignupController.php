<?php
declare(strict_types=1);
use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;
use MyApp\Models\Users;

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
        
        
        if ($this->request->isPost()) {
            $nama = $this->request->getPost("nama");
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");
            $angkatan = $this->request->getPost("angkatan");
            $kpassword = $this->request->getPost("kpassword");

            if ($nama === "") {
                $this->flash->error("Nama anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            if ($email === "") {
                $this->flash->error("Email anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            if ($angkatan === "") {
                $this->flash->error("Angkatan anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            if ($password === "") {
                $this->flash->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            if ($kpassword === "") {
                $this->flash->error("Konfirmasi Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            if ($password !== $kpassword) {
                $this->flas->error("Password dan Konfirmasi Password anda tidak cocok");
                //pick up the same view to display the flash session errors
                return $this->view->pick("signup/index");
            }

            $user = new Users();
            $user->assign(
                [
                    "nama" => $nama,
                    "angkatan" => $angkatan,
                    "password" => sha1($password),
                    "email" =>$email,
                ]
            );
            // Store and check for errors
            $success = $user->save();

            if ($success) {
                $this->flash->success(
                    'Akun berhasil dibuat, silahkan login'
                );
    
                return $this->response->redirect('session/');
            } else {
                $this->flash->error("Gagal mendaftar");
                return $this->response->redirect('signup');
            }
            
        }
    }

}

