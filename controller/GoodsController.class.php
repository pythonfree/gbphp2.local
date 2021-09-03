<?php

class GoodsController extends Controller
{
    public string $view = 'goods';

    public function __construct()
    {
        parent::__construct();
        $this->h1 = $this->title . ' -> все курсы';
    }

    public function index($data)
    {
        $goods = Good::getGoodsAll();
        return ['goods' => $goods];
    }
}