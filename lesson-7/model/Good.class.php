<?php

class Good extends Model
{
    protected static $table = 'products';
    public static $logErrors = [];

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

    public static function checkActionGood()
    {
        if (isset($_POST['edit'])) {
            return self::getGoodInfo($_POST['edit'])[0];
        }

        if (isset($_POST['send'])) {
            $dataGood = self::getFormData($_POST);

            self::updateGood($dataGood);
        }

        if (isset($_POST['add'])) {
            echo "added";
        }

        if (isset($_POST['delete'])) {
            echo "deleted";
        }
    }

    public static function getGoods()
    {
        return db::getInstance()->Select(
            "SELECT `id`, `title`, `img` 
            FROM " . self::$table . " INNER JOIN images ON 
            (products.id = images.product_id)"
        );
    }

    public static function getGoodInfo($id = null)
    {
        return db::getInstance()->Select(
            "SELECT 
            `id`, `title`, `img`, price, `quantity`, desc_short, desc_long, type_bike, `age`, max_weight, type_drive, bike_weight, max_speed, mileage_at_time, charging_time, frames_material
            FROM products
            INNER JOIN images ON (products.id = images.product_id)
            INNER JOIN specifications ON (products.id = specifications.product_id)
            WHERE id = :id",

            ['id' => (int)$id]
        );
    }

    public static function getCatalogGoods()
    {
        return db::getInstance()->Select(
            "SELECT 
            `id`, `title`, img, desc_short
            FROM products
            INNER JOIN images ON (products.id = images.product_id)"
        );
    }

    public static function getGoodPrice($id_good)
    {
        // $result = db::getInstance()->Select(
        //     'SELECT price FROM goods WHERE id_good = :id_good',
        //     ['id_good' => $id_good]);

        // return (isset($result[0]) ? $result[0]['price'] : null);
    }

    private static function updateGood($data)
    {
        try {
            if (!$data) {
                throw new Exception("Ошибка при изменении товара");
            } else {
                db::getInstance()->Query(
                    "UPDATE products
                    INNER JOIN specifications ON (products.id = specifications.product_id)
                    SET 
                    title = :title,
                    price = :price,
                    quantity = :quantity,
                    desc_short = :desc_short,
                    desc_long = :desc_long,
    
                    type_bike = :type_bike,
                    age = :age,
                    max_weight = :max_weight,
                    type_drive = :type_drive,
                    bike_weight = :bike_weight,
                    max_speed = :max_speed,
                    mileage_at_time = :mileage_at_time,
                    charging_time = :charging_time,
                    frames_material = :frames_material
    
                    WHERE id = :id",

                    [
                        'id' => $data['id'],
                        'title' => $data['title'],
                        'price' => $data['price'],
                        'quantity' => $data['quantity'],
                        'desc_short' => $data['desc_short'],
                        'desc_long' => $data['desc_long'],

                        'type_bike' => $data['type_bike'],
                        'age' => $data['age'],
                        'max_weight' => $data['max_weight'],
                        'type_drive' => $data['type_drive'],
                        'bike_weight' => $data['bike_weight'],
                        'max_speed' => $data['max_speed'],
                        'mileage_at_time' => $data['mileage_at_time'],
                        'charging_time' => $data['charging_time'],
                        'frames_material' => $data['frames_material'],
                    ]
                );
                header("Location: index.php?path=Admin/index");
                return;
            }

        } catch (Exception $e) {
            self::$logErrors["ERROR"] = $e->getMessage();
        }
    }
}
