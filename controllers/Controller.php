<?php

class Controller {
    public $twig;

    // Подключаем шаблонизатор
    function __construct(){
        $loader = new Twig_Loader_String();
        $loader = new Twig_Loader_Filesystem('views');

        $twig = new Twig_Environment($loader);
        $this->twig = new Twig_Environment($loader, array(
            'cache'       => 'compilation_cache',
            'auto_reload' => true));
    }
}