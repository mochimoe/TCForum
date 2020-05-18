<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Assets\Asset\Css;

use MyApp\Models\Komens;

class KomenController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);

    }

    public function createAction($postid) //untu membuat komentar baru dan menyimpannya ke database
    {
        
        $isi = $this->request->get('isi_komen');

        $komen = new Komens();

        $auth = $this->session->get('auth');
        $userid = $auth['id'];

        $komen->id_post = $postid;
        $komen->id_user= $userid;
        $komen->isi_komen = $isi;

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    'controller' => 'posts',
                    'action'     => 'show',
                ]
            );
        } else
        {
            $komen->save();

            return $this->dispatcher->forward(
                [
                    'controller' => 'posts',
                    'action'     => 'detail',
                    'params'     => [$postid],
                ]
            );
        }
        
        

    }
    public function editkomenAction($id)
    {
        $this->tag->setTitle('Edit Komen');
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);
        //fungsi editnya
        $auth = $this->session->get('auth');
        $userid = $auth['id'];
        
        $find_komen = Komens::findFirst($id);
        
        if($find_komen === null){
            $this->flash->error("Not Authorized");
            return $this->response->redirect('/posts/show');
        }
        // $this->view->disable();

        $this->view->komen = $find_komen;

    }
    public function updateAction($id)
    {
        $isi_komen = $this->request->get('isi');

        $komen = Komens::findFirst($id);

        $komen->isi_komen = $isi_komen;

        if($this->request->isPost())
        {
            $komen->save();
        }

        $this->flash->success(
            'Komentar berhasil diubah'
        );
        return $this->dispatcher->forward(
            [
                'controller' => 'posts',
                'action'     => 'detail',
                'params'     => [$komen->id_post],
            ]
        );

    }

    public function deleteAction($id) //untuk menghapus komentar
    {
        $komen = Komens::findFirst($id);
        $postid = $komen->id_post;
        if($komen->delete())
        {
            return $this->dispatcher->forward(
                [
                    'controller' => 'posts',
                    'action'     => 'detail',
                    'params'    => [$postid],
                ]
            );
        }else
        {
            echo "kapok ga iso";
        }
    }

   

}

