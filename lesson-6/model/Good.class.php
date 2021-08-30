<?php

class Good extends Model {
    protected static $table = 'products';

    protected static function setProperties()
    {
        self::$properties['id'] = [
            'type' => 'int'
        ];

        self::$properties['title'] = [
            'type' => 'varchar',
            'size' => 255
        ];

        self::$properties['price'] = [
            'type' => 'decimal'
        ];

        self::$properties['quantity'] = [
            'type' => 'int'
        ];

        self::$properties['img_id'] = [
            'type' => 'int'
        ];

        self::$properties['desc_short'] = [
            'type' => 'text'
        ];

        self::$properties['desc_long'] = [
            'type' => 'text'
        ];

        self::$properties['specification_id'] = [
            'type' => 'int'
        ];
    }

    public static function getGoods($categoryId)
    {
        return db::getInstance()->Select(
            'SELECT id, `title`, price, `quantity`, img, desc_short, desc_long,  FROM goods WHERE id_category = :category AND status=:status',
            ['status' => Status::Active, 'category' => $categoryId]);
    }

    public static function getGoodInfo(){
        // return db::getInstance()->Select(
        //     "SELECT 
        //     id, title, img, type_bike, age, max_weight, type_drive, bike_weight, max_speed, mileage_at_time, charging_time, frames_material
        //     FROM products
        //     INNER JOIN images ON (products.id = images.product_id)
        //     INNER JOIN specifications ON (`products.id` = `specifications.product_id`)
        //     WHERE id = '1';"
        // );


        // return db::getInstance()->Select(
        //     'SELECT * FROM goods WHERE id_good = :id_good',
        //     ['id_good' => (int)$this->id_good]);
    }

    public static function getGoodPrice($id_good){
        // $result = db::getInstance()->Select(
        //     'SELECT price FROM goods WHERE id_good = :id_good',
        //     ['id_good' => $id_good]);

        // return (isset($result[0]) ? $result[0]['price'] : null);
    }
}