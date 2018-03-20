<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 19-3-2018
 * Time: 10:41
 */

class Buienradar extends Crud
{
    //properties

    private $prop_urlRadarView;
    private $prop_urlGraphsView;
    private $prop_latitude;
    private $prop_longitude;

    //constructor

    public function __construct($urlRadar, $urlGraphs, $latitude, $longitude)
    {
        $this->prop_urlRadarView = $urlRadar;
        $this->prop_urlGraphsView = $urlGraphs;
        $this->prop_latitude = $latitude;
        $this->prop_longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getPropUrlRadarView()
    {
        return $this->prop_urlRadarView;
    }

    /**
     * @param mixed $prop_urlRadarView
     */
    public function setPropUrlRadarView($prop_urlRadarView)
    {
        $this->prop_urlRadarView = $prop_urlRadarView;
    }

    /**
     * @return mixed
     */
    public function getPropUrlGraphsView()
    {
        return $this->prop_urlGraphsView;
    }

    /**
     * @param mixed $prop_urlGraphsView
     */
    public function setPropUrlGraphsView($prop_urlGraphsView)
    {
        $this->prop_urlGraphsView = $prop_urlGraphsView;
    }

    /**
     * @return mixed
     */
    public function getPropLatitude()
    {
        return $this->prop_latitude;
    }

    /**
     * @param mixed $prop_latitude
     */
    public function setPropLatitude($prop_latitude)
    {
        $this->prop_latitude = $prop_latitude;
    }

    /**
     * @return mixed
     */
    public function getPropLongitude()
    {
        return $this->prop_longitude;
    }

    /**
     * @param mixed $prop_longitude
     */
    public function setPropLongitude($prop_longitude)
    {
        $this->prop_longitude = $prop_longitude;
    }

    //methods
    public function getView()
    {
        echo"
        <iframe id='mapBuienRadar' src='https://gadgets.buienradar.nl/gadget/zoommap/?lat=52.33575&lng=5.61527&overname=2&zoom=8&naam=3844BD&size=3&voor=1' scrolling=no width=550 height=512 frameborder=no></iframe>
        <iframe id='graphsBuienRadar' src='//gadgets.buienradar.nl/gadget/forecastandstation/6260/' noresize scrolling=no hspace=0 vspace=0 frameborder=0 marginheight=0 marginwidth=0 width=300 height=190></iframe>
        
<script>
    window.setInterval('reloadIFrame();', 1800000);
    function reloadIFrame() {
        document.getElementById('mapBuienRadar').src='https://gadgets.buienradar.nl/gadget/zoommap/?lat=52.33575&lng=5.61527&overname=2&zoom=8&naam=3844BD&size=3&voor=1';
        document.getElementById('graphsBuienRadar').src='//gadgets.buienradar.nl/gadget/forecastandstation/6260/';
    }
</script>

        ";
    }
}