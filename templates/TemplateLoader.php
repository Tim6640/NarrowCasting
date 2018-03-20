<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-3-2018
 * Time: 11:09
 */
class TemplateLoader
{
    private $prop_templateID;

    function __construct($templateID)
    {
        $this->prop_templateID = $templateID;
    }

    private function loadComponent($componentName, $params){
        $newComponent = new $componentName(...$params);
        return $newComponent->view();
    }

    public function getView(){
        foreach ($components as $component){
            $this->loadComponent($component['componentName'], $params);
        }
    }
}