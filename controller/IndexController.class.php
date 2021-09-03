<?php

class IndexController extends Controller
{
    public string $view = 'index';

    function __construct()
    {
        parent::__construct();
        $this->h1 .= 'Выбери свою профессию!';
    }

    //метод, который отправляет в представление информацию в виде переменной content_data
    function index($data)
    {
        return 'Только сегодня, приобретая ЛЮБЫЕ два курса, оплатить нужно только один!';
    }

}

//site/index.php?path=index/test/5