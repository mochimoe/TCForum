<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Tag;
use Phalcon\Assets\Asset\Css;
use Phalcon\Assets\Asset\Js;


class ControllerBase extends Controller
{
    protected function initialize()
    {
        $css1 = new Css('css/style.css');
        $this->assets->addAsset($css1);
        // Prepend the application name to the title
        $this->tag->prependTitle('TCForum | ');
    }
}
