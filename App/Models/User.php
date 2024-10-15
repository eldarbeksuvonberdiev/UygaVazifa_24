<?php
namespace App\Models;

use PDO;

class User extends Model{
    
    public static $table = 'user';

    public static function getOne($email){
        $sql = "SELECT * FROM " . static::$table . " WHERE email = :email";
        $query = self::connect()->prepare($sql);
        $query->bindParam(":email", $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public static function lastInsert(){
        $id = self::connect()->lastInsertId();
    }
}
?>