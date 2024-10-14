<?php

namespace App\Models;

use PDO;

class Kitoblar extends Model
{
    public static $table = 'kitoblar';

    public static function all()
    {
        //SELECT g.id, g.name, COUNT(b.id) AS book_count FROM janr g LEFT JOIN kitoblar b ON g.id = b.janr_id GROUP BY g.id, g.name;
        $sql = "SELECT " . static::$table . ".*, muallif.name AS mname, janr.name AS jname FROM " . static::$table . " LEFT JOIN muallif ON kitoblar.muallif_id=muallif.id LEFT JOIN janr ON kitoblar.janr_id=janr.id";
        // $sql = "SELECT * FROM " . static::$table ;
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getJM()
    {
        $sql = "SELECT * FROM janr";
        $sql1 = "SELECT * FROM muallif";

        $query = self::connect()->query($sql);
        $query1 = self::connect()->query($sql1);

        $query = $query->fetchAll(PDO::FETCH_OBJ);
        $query1 = $query1->fetchAll(PDO::FETCH_OBJ);

        $data = [
            'janr' => $query,
            'muallif' => $query1
        ];
        // dd($data);
        return $data;
    }
}
