<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 07/12/2018
 * Time: 10:02
 */

class Connection
{

    /**
     * @return PDO
     */
    public static function main(){

        try{
        $opciones=[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8", PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT=>true];

        $connection=new PDO('mysql:host=curso-php7.local;dbname=cursophp7;charsetf=utf8',
        'userCurso',
        'php',
        $opciones
        );

        }catch(PDOException $PDOException){
            die($PDOException->getMessage());
        }
        return $connection;
    }
}