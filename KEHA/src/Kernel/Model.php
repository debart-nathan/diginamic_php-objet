<?php

namespace Nath\Keha\Kernel;


use Nath\Keha\Config\Config;
use Nath\Keha\Entity\User;

class Model extends \PDO
{
    public static $instance = null;


    private function __construct()
    {
        try {
            parent::__construct(Config::BDDCONNECT, Config::BDDUSER, Config::BDDPWRD);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public static function getAll()
    {
        return static::execSQL("SELECT * FROM  " . static::getEntity());
    }

    public static function getById($id)
    {
        $result = static::execSQL("SELECT * FROM  " . static::getEntity() . "WHERE id = $id");
        return $result[0];
    }

    public static function delete(int $id)
    {
        $sql = "delete from" . self::getEntity() . "where id=$id";
        return self::$instance->exec($sql);
    }

    public static function insert(array $datas)
    {
        $sql = "insert into" . self::getEntity() . "values (NULL,";
        $count = count($datas);
        $i = 1;
        foreach ($datas as $data) {
            if ($i < $count) {
                $sql .= '"' . $data . '",';
            } else {
                $sql .= '"' . $data . '"';
            }
            $i++;
        }
        $sql .= ")";
        return self::$instance->exec($sql);
    }

    public static function update(int $id, array $datas)
    {
        $sql = "update " . self::getEntity() . " set ";
        $count = count($datas);
        $i = 1;
        foreach ($datas as $key => $value) {
            if ($i < $count) {
                $sql .= $key . ' = "' . $value . '" ,';
            } else {
                $sql .= $key . ' = "' . $value . '"';
            }
            $i++;
        }
        $sql .= " where id = $id";
        return self::$instance->exec($sql);
    }

    public static function getEntity()
    {
        $className = static::class;
        $tab = explode('\\', $className);
        return $tab(count($tab) - 1);
    }

    private static function execSQL($sql)
    {

        $pdoStatement = static::getInstance()->query($sql);
        return $pdoStatement->fetchALL(\PDO::FETCH_CLASS, "Nath\Keha\Entity\User");
    }
}
