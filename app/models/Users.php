<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $nama;
    public $email;
    public $angkatan;
    public $password;

    public function initialize(){
        $this->setConnectionService('db');
        $this->setSchema('dbo');
        $this->setSource('users');

            $this->hasMany(
                'id',
                Posts::class,
                'id_user'
            );
    
            $this->hasMany(
                'id',
                Komens::class,
                'id_user'
            );
        
    }

    public function onConstruct(){
        
    }
}