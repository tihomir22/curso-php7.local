<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 17/12/2018
 * Time: 17:58
 */
require_once __DIR__. '/../database/QueryBuilder.php';

class ContactosRepository extends QueryBuilder
{
    public function __construct(string $table='contactos',string $classEntity='Contactos')
    {
        parent::__construct($table,$classEntity);
    }
}