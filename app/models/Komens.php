<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Komens extends Model
{
    public $id;
    public $isi_komen;
    public $id_post;
    public $id_user;

    public function initialize(){
        $this->setConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Komens');

        $this->belongsTo(
            'id_post',
            Posts::class,
            'id',
        );
        $this->belongsTo(
            'id_user',
            Users::class,
            'id',
        );
    }

    public function onConstruct(){
        
    }
}