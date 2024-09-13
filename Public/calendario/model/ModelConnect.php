<?php
namespace Models;

require_once DIRREQ . "/config/config.php";

abstract class ModelConnect
{
    protected function conectDB()
    {
        try{
            $con=new \PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);
            return $con;
        }catch (\PDOException $erro) {
            return $erro->getMessage();
        }
    }
}