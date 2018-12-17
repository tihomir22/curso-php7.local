<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 17/12/2018
 * Time: 17:58
 */
require_once __DIR__. '/../database/QueryBuilder.php';

class PartnerRepository extends QueryBuilder
{
    public function __construct(string $table='respartners',string $classEntity='Partner')
    {
        parent::__construct($table,$classEntity);
    }
}