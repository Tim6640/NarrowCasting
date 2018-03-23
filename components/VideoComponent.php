<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 21-3-2018
 * Time: 11:13
 */
class VideoComponent
{
    private $prop_videoName;

    function __construct($videoName)
    {
        $this->prop_videoName = $videoName;
    }

    /**
     * @return mixed
     */
    public function getPropVideoName()
    {
        return $this->prop_videoName;
    }

    /**
     * @param mixed $prop_videoName
     */
    public function setPropVideoName($prop_videoName)
    {
        $this->prop_videoName = $prop_videoName;
    }

    public function view(){
        echo '<video src="uploads/vid'. $this->getPropVideoName() .'" poster="assests/img/loading.gif" autoplay>';
    }

}
?>