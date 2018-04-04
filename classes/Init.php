<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 14-3-2018
 * Time: 11:09
 */
class Init extends Template
{
    private $prop_templateID;

    private $prop_component;

    private $prop_componentParams;

    function __construct($templateID, $component)
    {
        $this->prop_templateID = $templateID;
        $this->prop_component = $component;
        $this->prop_componentParams = (explode(',',$component[0]));
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getPropTemplateID()
    {
        return $this->prop_templateID;
    }

    /**
     * @param mixed $prop_templateID
     */
    public function setPropTemplateID($prop_templateID)
    {
        $this->prop_templateID = $prop_templateID;
    }

    /**
     * @return mixed
     */
    public function getPropComponentID()
    {
        return $this->prop_component;
    }

    /**
     * @param mixed $prop_componentID
     */
    public function setPropComponentID($prop_componentID)
    {
        $this->prop_component = $prop_componentID;
    }

    /**
     * @return mixed
     */
    public function getPropComponentParams()
    {
        return $this->prop_componentParams;
    }

    /**
     * @param mixed $prop_componentParams
     */
    public function setPropComponentParams($prop_componentParams)
    {
        $this->prop_componentParams = $prop_componentParams;
    }

    private function loadComponent($componentID, $componentParams){
        $this->setPropTable("component");
        $this->setPropColumns(array("componentName"));
        $this->setPropWhere("componentID");
        $this->setPropWhereConditions($componentID);
        $component = $this->selectFromTable();
        $componentName = $component[0]['componentName'];

        $newComponent = new $componentName(...$componentParams);
        return $newComponent->view();
    }

    public function loadTemplate($templateID){
        $this->setPropColumns(array("templateName"));
        $this->setPropWhere("templateID");
        $this->setPropWhereConditions($templateID);
        $templateName = $this->selectFromTable();
var_dump($this->getPropComponentID());
        switch ($templateName[0]['templateName']) {
            case "Fullscreen":
                echo '
                <div class="container-fluid">

                    <div class="row">
                
                        <div id="fullscreen" class="col-12">';

                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                    </div>
                
                </div>
                
                </body>';
                break;

            case "L-R":
                echo '
                <div class="container-fluid">

                    <div class="row">
                
                        <div id="L50" class="col-6">';

//                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                        <div id="R50" class="col-6">';

//                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                    </div>
                
                </div>';
                break;

            case "Lo-Lb-R":
                echo '
                <div class="container-fluid">

                    <div class="row">
                
                        <div id="R" class="col-6 offset-col-6">';

                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '

                        </div>
                
                        <div class="row">
                
                            <div id="Lb" class="col-6">';

                            $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                            echo '
                
                            </div>
                
                            <div id="Lo" class="col-6">';

                            $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                            echo '
                
                            </div>
                
                        </div>
                
                    </div>
                
                </div>';
                break;

            case "O-B":
                echo '
                <div class="container-fluid">

                    <div class="row">
                
                        <div id="O" class="col-12">';

                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                    </div>
                
                    <div class="row">
                
                        <div id="B" class="col-12">';

                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                    </div>
                
                </div>';
                break;

            case "Ro-Rb":
                echo '
                <div class="container-fluid">

                    <div class="row">
                
                        <div id="L" class="col-6">';

                        $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                        echo '
                
                        </div>
                
                        <div class="row">
                
                            <div id="Rb" class="col-6 offset-col-6">';

                            $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                            echo '
                
                            </div>
                
                            <div id="Ro" class="col-6 offset-col-6">';

                            $this->loadComponent($this->getPropComponentID(), $this->getPropComponentParams());
                            echo '
                
                            </div>
                
                        </div>
                
                    </div>
                
                </div>';
                break;
        }
    }

    public function getView(){
        $this->loadTemplate($this->getPropTemplateID());
    }
}