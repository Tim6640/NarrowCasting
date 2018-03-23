<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 19-3-2018
 * Time: 10:53
 */
class Component extends Crud
{
    function __construct()
    {
        $columns = array("*");
        parent::__construct("component", $columns);
    }

    public function selectComponent($componentID){
        $this->setPropWhere("componentID");
        $this->setPropWhereConditions($componentID);
        $this->selectFromTable();
    }
}