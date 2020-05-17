<?php
declare(strict_types=1);
use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;

class SessionController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);

        $this->tag->setTitle(
            'Masuk'
        );
     

    }
    public function indexAction(){
        return $this->view;
    }

    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id'    => $user['id'],
                'nama'  => $user['nama'],
                'email' => $user['email'],
                'angkatan' => $user['angkatan'],
            ]
        );
    }

    public function startAction()
    {
        
        if (true === $this->request->isPost()) {
          
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $db = $this->getDI()->get('db'); 
            $sql = "SELECT * FROM dbo.Users  WHERE email = '".$email."'" . " AND " . "password = '".sha1($password)."'";

            $result = $db->query($sql);
            
            $user=$result->fetchAll();
            
            if (count($user)>0) {
                $user = $user[0];
                $this->_registerSession($user);

                $this->flash->success(
                    'Welcome ' . $user['nama']
                );

                return $this->response->redirect('/');
            }

            $this->flash->error(
                'Wrong email/password'
            );
        }

        return $this->dispatcher->forward(
            [
                'controller' => 'session',
                'action'     => 'index',
            ]
            );

            $this->session->set('email', $email);
        
    }
    
}

