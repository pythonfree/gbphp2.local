<?php

class Good extends Model
{
    protected static string $table = 'goods';

    protected static function setProperties()
    {
        self::$properties['id_good'] = [
            'type' => 'int'
        ];

        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['price'] = [
            'type' => 'float'
        ];

        self::$properties['id_category'] = [
            'type' => 'int'
        ];

        self::$properties['status'] = [
            'type' => 'int'
        ];
    }


    public static function getGoodsAll()
    {
        return db::getInstance()->Select('SELECT * FROM goods WHERE status=:status',
            ['status' => Status::Active]);
    }

    public static function getGoodNameById($id_good)
    {
        return db::getInstance()->Select('SELECT * FROM goods WHERE status=:status 
                        AND id_good = :id_good',
            ['status' => Status::Active, 'id_good' => $id_good]);
    }

    public static function getGoodsById($id_category)
    {
        return db::getInstance()->Select('SELECT * FROM goods WHERE status=:status 
                        AND id_category = :id_category',
            ['status' => Status::Active, 'id_category' => $id_category]);
    }

    public function getGoodInfo()
    {
        return db::getInstance()->Select(
            'SELECT * FROM goods WHERE id_good = :id_good',
            ['id_good' => (int)$this->id_good]);
    }

    public static function getGoodPrice($id_good)
    {
        $result = db::getInstance()->Select(
            'SELECT price FROM goods WHERE id_good = :id_good',
            ['id_good' => $id_good]);

        return ($result[0]['price'] ?? null);
    }
}