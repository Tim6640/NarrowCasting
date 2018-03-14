<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 5-3-2018
 * Time: 08:44
 */


class DbConnect
{
    private $objDb;

    public function __construct()
    {
        include_once "database/dbConfig.php";
        try
        {
            $this->objDb = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORDDB);
            $this->objDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //uitzetten in live-omgeving!!
        }

        catch (PDOException $ex)
        {
            echo("Fatale PDO fout: " . $ex->getMessage());
        }

        catch (Exception $ex)
        {
            echo("Fatale fout: " . $ex->getMessage());
        }
    }

    public function connect()
    {
        return $this->objDb;
    }

    public function disconnect()
    {
        return $this->objDb = null;

    }
}