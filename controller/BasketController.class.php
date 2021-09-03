<?php

class BasketController extends Controller
{
    public string $view = 'basket';

    public function __construct()
    {
        parent::__construct();
        $this->h1 = $this->title . ' -> все товары';
    }

    public function index($data)
    {
        $orders = Basket::getBasketAll();
        return ['orders' => $orders];
    }

    public function delete()
    {
        $_REQUEST['asAjax'] = true;

        $result = ['result' => 0];

        $id_basket = (int)$_REQUEST['id_basket'];
        if ($id_basket > 0) {
            file_put_contents(__DIR__ . '/../logs/error_basket_delete.txt', '');
            try {
                Basket::deleteFromBasketById($id_basket);
                $result['result'] = 1;
                return json_encode($result);
            } catch (PDOException $e) {
                file_put_contents(__DIR__ . '/../logs/error_basket_delete.txt', $e->getMessage());
            }
        }
        return json_encode($result);
    }
}