<?php
namespace App\Models;

use PDO;

class Muallif extends Model
{
    public static $table = 'muallif';

    public static function all()
    {
        //SELECT g.id, g.name, COUNT(b.id) AS book_count FROM janr g LEFT JOIN kitoblar b ON g.id = b.janr_id GROUP BY g.id, g.name;
        $sql = "SELECT " .static::$table .".*, COUNT(kitoblar.id) AS muallif FROM " . static::$table . " LEFT JOIN kitoblar ON muallif.id=kitoblar.muallif_id GROUP BY muallif.id";
        // $sql = "SELECT * FROM " . static::$table ;
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}


?>