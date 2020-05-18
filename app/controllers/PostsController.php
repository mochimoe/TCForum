<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Assets\Asset\Css;
use Phalcon\Mvc\Model\Query;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
use Phalcon\Paginator\Adapter\QueryBuilder as PaginatorQueryBuilder;
use Phalcon\Http\Request;

use MyApp\Models\Posts;
use MyApp\Models\Users;
use MyApp\Models\Komens;

class PostsController extends ControllerBase
{
    public function initialize()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);
        parent::initialize();

        return $this->view;

    }
    public function indexAction()
    {

    }

    public function showKuliahAction() //untuk menampilkan list postingan yg dibuta user
    {
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);

        $this->tag->setTitle('Dashboard');

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        $user = Users::find();

        $find_post = Posts::find([
            'kategori = \'Kuliah\'',
        ]);
        $this->view->posts = $find_post;
        $this->view->users = $user;
        $this->view->pick('posts/show');

    }
    public function showSerbaAction() //untuk menampilkan list postingan yg dibuta user
    {
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);

        $this->tag->setTitle('Dashboard');

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        $user = Users::find();

        $find_post = Posts::find([
            'kategori = \'Serba-Serbi\'',
        ]);
        $this->view->posts = $find_post;
        $this->view->users = $user;
        $this->view->pick('posts/show');

    }

    public function showAction() //untuk menampilkan list postingan yg dibuta user
    {
        $this->tag->setTitle('Dashboard');

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        $user = Users::find();

        $find_post = Posts::find();
        $this->view->posts = $find_post;
        $this->view->users = $user;

    }
    public function saveAction() //untuk create postingan yg telah dibuat, di insert kedalam database
    {

        $judul = $this->request->get('judul');
        $isi = $this->request->get('isi');
        $kategori = $this->request->get('kategori');

        $auth = $this->session->get('auth');
        $userid = $auth['id'];
            
        $posts = new Posts();

        $posts->judul = $judul;
        $posts->isi = $isi;
        $posts->kategori=$kategori;
        $posts->id_user = $userid;

        if($this->request->isPost())
        {
            $posts->save();
        }
        return $this->response->redirect('posts/show');
    }
    public function editAction($id) //untuk menuju lama edit
    {
        $this->tag->setTitle('Edit Post');
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);
        //fungsi editnya
        $auth = $this->session->get('auth');
        $userid = $auth['id'];
        
        $find_post = Posts::findFirst([
            'id = :id: and id_user = :id2:',
            'bind' => [
            'id' => $id,
            'id2' => $userid,
            ]
        ]);
        
        if($find_post === null){
            $this->flash->error("Not Authorized");
            return $this->response->redirect('/posts/show');
        }
        // $this->view->disable();

        $this->view->posts = $find_post;

        //var_dump($find_post);

    }
    public function updateAction($id) //untuk mengupdate data yg telah diubah, dan ditabase juga dirubah datanya. dan dikembalikan ke laman show
    {
        $this->tag->setTitle('Edit Post');
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);

        //function

        $judul = $this->request->get('judul');
        $isi = $this->request->get('isi');
            
        $posts = Posts::findFirst($id);

        $posts->judul = $judul;
        $posts->isi = $isi;

        if($this->request->isPost())
        {
            $posts->save();
        }

        return $this->response->redirect('posts/show');

    }
    public function deleteAction($id)  //untuk menghapus postingan
    {
        $auth = $this->session->get('auth');
        $userid = $auth['id'];
        $post = Posts::findFirst([
            'id = :id: and id_user = :id2:',
            'bind' => [
            'id' => $id,
            'id2' => $userid,
            ]
        ]);
        
        if($post === null){
            $this->flash->error("Not Authorized");
            return $this->response->redirect('/posts/show');
        }

        $komens = Komens::find([ 
            'id_post = :id:',
            'bind' => [
            'id' => $id,
            ]
        ]);
        if($komens !== null){
            foreach($komens as $komen){
                $komen->delete();
            }
        }
        if($post->delete())
        {
            return $this->response->redirect('posts/show');
        }else
        {
            echo "kapok ga iso";
        }


    }
    public function detailAction($id)
    {
        $this->tag->setTitle('Detail');
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);
        
        //function
        $post = Posts::findFirstById($id);
       // $komen = Komens::find();
        $user = Users::find();

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;


        $this->view->posts = $post;
        // $this->view->disable();
        $this->view->komenss = $post->komen;
       // var_dump($post);
        $this->view->users = $user;

        // foreach ($post->komen as $komenss) {
        //     echo $komenss->isi_komen;
        // }

       
    }

}

