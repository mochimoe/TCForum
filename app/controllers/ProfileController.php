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

class ProfileController extends ControllerBase
{
    public function indexAction()
    {
        $css1 = new Css('css/styles.css');
        $this->assets->addAsset($css1);

        $this->tag->setTitle('Profile');

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        $find_post = Posts::find([
            'id_user = :id2:',
            'bind' => [
            'id2' => $auth['id'],
            ]
        ]);
        $this->view->posts = $find_post;

    }

   
}

