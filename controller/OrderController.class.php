<?php

class OrderController extends Controller
{
    public function add()
    {
        $_REQUEST['asAjax'] = true;

        $result = ['result' => 0];

        $id_good = (int)$_REQUEST['id_good'];
        if ($id_good > 0) {
            file_put_contents(__DIR__ . '/../logs/error_add.txt', '');
            try {
                $basket = new Basket();
                $basket->setIdGood($id_good);
                $basket->setPrice(Good::getGoodPrice($id_good));
                $basket->save();
                $result['result'] = 1;
                return json_encode($result);
            } catch (PDOException $e) {
                file_put_contents(__DIR__ . '/../logs/error_add.txt', $e->getMessage());
            }
        }
        return json_encode($result);
    }
}