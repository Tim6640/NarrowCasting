<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 12-4-2018
 * Time: 10:59
 */
class Slide extends Crud
{
    function __construct()
    {
        parent::__construct("slide", array("*"));
    }

    public function getSlidesWhere($where, $whereCondition){
        $this->setPropWhere($where);
        $this->setPropWhereConditions($whereCondition);
        return $this->selectFromTable();
    }
}