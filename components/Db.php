<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Db
 *
 * @author Admin
 */
class Db
{

    public static function getConnection()
    {
        $host = 'Localhost';
        $dbname = 'tasck_maneger';
        $username ='root';
        $password = '';
        try {
            $db = new PDO("mysql:host=localhost;dbname=tasck_maneger", $username, $password);
            // set the PDO error mode to exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           //echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        $db->exec('SET CHARACTER SET utf8');
        return $db;
    }
}