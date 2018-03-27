<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 20-3-2018
 * Time: 15:00
 */
class Template extends Crud
{
    private $prop_templateName;

    public function __construct()
    {
        $columns = array("*");
        parent::__construct("template", $columns);
    }

    /**
     * @return mixed
     */
    public function getPropTemplateName()
    {
        return $this->prop_templateName;
    }

    /**
     * @param mixed $prop_templateName
     */
    public function setPropTemplateName($prop_templateName)
    {
        $this->prop_templateName = $prop_templateName;
    }

    public function selectAllTemplates(){
        $this->selectFromTable();
    }
}