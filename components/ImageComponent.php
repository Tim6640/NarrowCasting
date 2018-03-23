<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 21-3-2018
 * Time: 09:05
 */
class ImageComponent
{
    private $prop_imageName;

    function __construct($imageName)
    {
        $this->prop_imageName = $imageName;
    }

    /**
     * @return mixed
     */
    public function getPropImageName()
    {
        return $this->prop_imageName;
    }

    /**
     * @param mixed $prop_imageName
     */
    public function setPropImageName($prop_imageName)
    {
        $this->prop_imageName = $prop_imageName;
    }

    public function view(){
        echo '<img src="uploads/img/'. $this->getPropImageName() .'" alt="'. $this->getPropImageName() .'">';
    }
}