<?php

class Category extends Model {
    protected static string $table = 'categories';

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['parent_id'] = [
            'type' => 'int',
        ];
    }

    public static function getCategoryNameById($id_category)
    {
        return db::getInstance()->Select('SELECT * FROM categories WHERE status=:status 
                        AND id_category = :id_category',
            ['status' => Status::Active, 'id_category' => $id_category]);
    }

    public static function getCategories($parentId = 0)
    {
        return db::getInstance()->Select('SELECT * FROM categories WHERE status=:status 
                        AND parent_id = :parent_id',
            ['status' => Status::Active, 'parent_id' => $parentId]);
    }
}