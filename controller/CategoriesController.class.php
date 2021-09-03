<?php

class CategoriesController extends Controller
{
    public string $view = 'categories';

//    public function __construct()
//    {
//        parent::__construct();
//        $this->h1 = $this->title . ' -> все';
//    }

    public function index($data)
    {
        $goods = Good::getGoodsById($data['id']);
        $categoryName = Category::getCategoryNameById($data['id']);
//        dump($categoryName[0]['name']);
        $this->h1 = $this->title . ' -> ' . $categoryName[0]['name'];
        return ['goods' => $goods];
    }

    public function goods($data)
    {
        $goodName = Good::getGoodNameById($data['id']);
//        dump($goodName);
        $this->h1 = $this->title . ' -> ' . $goodName[0]['name'];
        if ($data['id'] > 0) {
            $good = new Good(["id_good" => $data['id']]);
//            dump($good->getGoodInfo()[0]);
            return $good->getGoodInfo()[0];
        } else {
            header("Location: /categories/");
        }

        return null;
    }
}

