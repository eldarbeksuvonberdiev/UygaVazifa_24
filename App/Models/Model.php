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

    public static function getAllTask(){
        $sql = "SELECT ". static::$table .".*, user.name AS name FROM " . static::$table ." LEFT JOIN user ON ". static::$table .".user_id=user.id";
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getUsers(){
        $sql = "SELECT id,name FROM user WHERE role != 'admin'";
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createTask($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO " . static::$table . " ({$columns}) VALUES ({$values})";
        self::connect()->prepare($sql)->execute();
    }

    public static function getOwnTasks($id){
        // $sql = "SELECT 
        // SUM(CASE WHEN status = '1' THEN 1 ELSE 0 END) AS given,
        // SUM(CASE WHEN status = '2' THEN 1 ELSE 0 END) AS in_progress,
        // SUM(CASE WHEN status = '3' THEN 1 ELSE 0 END) AS done,
        // SUM(CASE WHEN status = '0' THEN 1 ELSE 0 END) AS rejected 
        // FROM task WHERE id = {$id}";
        // $sql = "SELECT * FROM ". static::$table ." WHERE id={$id}";
        $sql = "SELECT * FROM ". static::$table . " WHERE id = {$id} AND status = 1";
        $query1 = self::connect()->query($sql);
        $query1 = $query1->fetchAll(PDO::FETCH_OBJ);

        $sql = "SELECT * FROM ". static::$table . " WHERE id = {$id} AND status = 2";
        $query2 = self::connect()->query($sql);
        $query2 = $query2->fetchAll(PDO::FETCH_OBJ);
        
        $sql = "SELECT * FROM ". static::$table . " WHERE id = {$id} AND status = 3";
        $query3 = self::connect()->query($sql);
        $query3 = $query3->fetchAll(PDO::FETCH_OBJ);
        
        $sql = "SELECT * FROM ". static::$table . " WHERE id = {$id} AND status = 0";
        $query0 = self::connect()->query($sql);
        $query0 = $query0->fetchAll(PDO::FETCH_OBJ);
        
        $tasks = [
            "given" => $query1,
            "in_progress" => $query2,
            "done" => $query3,
            "rejected" => $query0
        ];
        return $tasks;
    }

}
