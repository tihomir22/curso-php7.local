<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 07/12/2018
 * Time: 11:33
 */

class QueryBuilder
{
    private $connection;

    /**
     * QueryBuilder constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(String $tabla,String $classEntity){
        $sql="SELECT * FROM $tabla";
        //$this->connection->query($sql);
        $pdostatement=$this->connection->prepare($sql);
        if($pdostatement->execute()===false){
            throw new QueryException("No se ha podido ejecutar la query");
        }else{
            return $pdostatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$classEntity);
        }
    }




}