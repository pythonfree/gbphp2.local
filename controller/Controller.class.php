<?php

class Controller
{
    public string $view = 'admin';
    public string $title = '';
    public string $h1 = '';

    public function __construct()
    {
        $this->title = Config::get('sitename');
    }

    public function index($data)
    {
        return [];
    }
}