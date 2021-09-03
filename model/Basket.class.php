<?php


class Basket extends Model
{
    protected $id_user = NULL;
    protected $id_good;
    protected $price = 0;
    protected $is_in_order = 0;
    protected $id_order = NULL;

    function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    function setUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $id_good
     */
    public function setIdGood($id_good)
    {
        $this->id_good = $id_good;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param int $is_in_order
     */
    public function setIsInOrder($is_in_order)
    {
        $this->is_in_order = $is_in_order;
    }

    /**
     * @param mixed $id_order
     */
    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    public static function getBasketAll()
    {
         return db::getInstance()->Select('SELECT * FROM basket, goods WHERE basket.id_good = goods.id_good', []);
    }

    public function save()
    {
        $query = '';
        file_put_contents(__DIR__ . '/../logs/query_add.txt', $query);

        $query = 'INSERT INTO basket (id_user, id_good, price, is_in_order, id_order) VALUES ('
                    . (($this->id_user) == NULL ? 0 : $this->id_user) . ','
                    . $this->id_good . ','
                    . $this->price . ','
                    . $this->is_in_order . ','
                    . (($this->id_order) == NULL ? 0 : $this->id_order) . ')';
        file_put_contents(__DIR__ . '/../logs/query_add.txt', $query);

        db::getInstance()->Query($query);
    }

    public static function deleteFromBasketById($id_basket)
    {
        $query = '';
        file_put_contents(__DIR__ . '/../logs/query_delete_from_basket.txt', $query);

        $query = 'DELETE FROM `basket` WHERE `id_basket`=:id_basket';
        file_put_contents(__DIR__ . '/../logs/query_delete_from_basket.txt', $query);

        db::getInstance()->Query($query, ['id_basket' => $id_basket]);
    }
}