<?php

//1.	Создать структуру классов ведения товарной номенклатуры.
//1.1.	Есть абстрактный товар.
//1.2.	Есть цифровой товар, штучный физический товар и товар на вес.
//1.3.	У каждого есть метод подсчёта финальной стоимости.
//1.4.	У цифрового товара стоимость постоянная и дешевле штучного товара в два раза, у штучного товара обычная стоимость,
// у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
//1.5.	Что можно вынести в абстрактный класс, наследование?


abstract class Good
{
    const DIGITAL_PRICE = 10;
    const PIECE_PRICE = 20;

    public $count;
    public $price;

    public function __construct($count, $price)
    {
        $this->price = $price;
        $this->count = $count;
    }

    public function getPrice()
    {
        return $this->count * $this->price;
    }

    public function getSalesRevenue()
    {
        return self::getPrice() * 0.5;
    }

}

class DigitalGood extends Good
{
    public function __construct($count, $price)
    {
        parent::__construct($count, $price);
        $this->count = $count;
        $this->price = self::DIGITAL_PRICE;
    }

    public function getSalesRevenue()
    {
        parent::getSalesRevenue();
        return self::getPrice() * 0.8;
    }
}

class PieceGood extends Good
{
    public function __construct($count, $price)
    {
        parent::__construct($count, $price);
        $this->count = $count;
        $this->price = self::PIECE_PRICE;
    }

    public function getSalesRevenue()
    {
        parent::getSalesRevenue();
        return self::getPrice() * 0.33;
    }
}

class BulkGood extends Good
{
    public function getPrice()
    {
        parent::getPrice();
        if (1 >= $this->count && 10 > $this->count) {
            return $this->count * $this->price;
        } elseif (10 >= $this->count && 30 > $this->count) {
            return $this->count * $this->price * 2;
        } else {
            return ($this->count * $this->price) ** 2;
        }
    }
}


//    2.	* Реализовать паттерн Singleton при помощи traits.

trait GetObject
{
    public static function getObject()
    {
        if (self::$object == null) {
            self::$object = new self;
        }
        return self::$object;
    }
}

class Db
{
    use GetObject;

    static $object;//объект нашего класса в будущем
    static $connect;

    private function __construct()
    {
//        self::$connect = ...
    }

    function select()
    {

    }
    function update()
    {

    }
    function delete($table,$where)
    {

    }
    function insert()
    {

    }
}
