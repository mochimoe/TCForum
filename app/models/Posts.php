<?php
 namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Posts extends Model
{
    public $id;
    public $id_user;
    public $judul;
    public $isi;
    public $kategori;

    public function initialize(){
        $this->setConnectionService('db');
       // $this->setWriteConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('Posts');

        $this->hasMany(
            'id',
            Komens::class,
            'id_post',
            [
                'reusable' => true,
                'alias'    => 'komen',
            ]
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