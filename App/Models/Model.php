<?php

namespace  App\Models;

use App\Databases\Database;
use PDO;

class Model extends Database
{

    public static $table;

    public static function all()
    {
        $sql = "SELECT * FROM " . static::$table;
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function show($id)
    {
        if (gettype((int)$id) == "integer") {
            $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
            $query = self::connect()->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }

    public static function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO " . static::$table . " ({$columns}) VALUES ({$values})";
        $result = self::connect()->prepare($sql)->execute();
        if ($result) {
            $_SESSION['auth'] = self::getOne($data['email']);
            return true;
        }
        return false;
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $result = self::connect()->prepare($sql);
        $result->bindParam(":id", $id);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    public static function update($data, $id)
    {
        $setValue = "";

        foreach ($data as $key => $value) {
            $setValue .= "{$key} = '{$value}',";
        }
        $setValue = rtrim($setValue, ",");

        $query = "UPDATE " . static::$table . " SET {$setValue} WHERE id = {$id}";
        $stmt = self::connect()->prepare($query);

        return $stmt->execute();
    }

    public static function attach($data){
        $stringV = "";

        foreach ($data as $key => $value) {
            if($key == "password")
                $value = md5($value);

            $stringV = $stringV . "{$key}='{$value}' AND ";
        }
        $cleanedS = rtrim($stringV,"AND ");
        $db = self::connect();
        $stmt = $db->query("SELECT * FROM " . static::$table . " WHERE {$cleanedS}");
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function getOne($email){
        $sql = "SELECT * FROM " . static::$table . " WHERE email = :email";
        $query = self::connect()->prepare($sql);
        $query->bindParam(":email", $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
