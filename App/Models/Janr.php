<?php

namespace App\Models;

use PDO;

class Janr extends Model
{
    public static $table = 'janr';

    public static function all()
    {
        //SELECT g.id, g.name, COUNT(b.id) AS book_count FROM janr g LEFT JOIN kitoblar b ON g.id = b.janr_id GROUP BY g.id, g.name;
        $sql = "SELECT " .static::$table .".*, COUNT(kitoblar.id) AS kitob FROM " . static::$table . " LEFT JOIN kitoblar ON janr.id=kitoblar.janr_id GROUP BY janr.id";
        // $sql = "SELECT * FROM " . static::$table ;
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
