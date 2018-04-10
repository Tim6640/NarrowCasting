<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 19-3-2018
 * Time: 10:41
 */

class Buienradar
{
    //properties
//
//    private $prop_urlRadarView;
//    private $prop_urlGraphsView;
//    private $prop_latitude;
//    private $prop_longitude;
//
//    //constructor
//
//    public function __construct($urlRadar, $urlGraphs, $latitude, $longitude, $table, $columns, $where='', $whereConditions='', $orderBy='', $value='')
//    {
//        parent::__construct($table, $columns, $where, $whereConditions, $orderBy, $value);
//        $this->prop_urlRadarView = $urlRadar;
//        $this->prop_urlGraphsView = $urlGraphs;
//        $this->prop_latitude = $latitude;
//        $this->prop_longitude = $longitude;
//    }


    //methods
    public function view()
    {

        echo"
        <div class='radarCenter'> 
        <p>
            <iframe id='mapBuienRadar' src='https://gadgets.buienradar.nl/gadget/zoommap/?lat=52.33575&lng=5.61527&overname=2&zoom=13&naam=3844BD&size=3&voor=1' scrolling=no width=550 height=512 frameborder=no></iframe>
            <iframe id='graphsBuienRadar' src='//gadgets.buienradar.nl/gadget/forecastandstationportrait/6260/' noresize scrolling=no hspace=0 vspace=0 frameborder=0 marginheight=0 marginwidth=0 width=175 height=518></iframe>
            <br>
            Mogelijk gemaakt door: Buienradar.
        </p>    
        </div> 
        <script>
            window.setInterval('reloadIFrame();', 1800000);
            function reloadIFrame() {
                document.getElementById('mapBuienRadar').src='https://gadgets.buienradar.nl/gadget/zoommap/?lat=52.33575&lng=5.61527&overname=2&zoom=13&naam=3844BD&size=3&voor=1';
                document.getElementById('graphsBuienRadar').src='//gadgets.buienradar.nl/gadget/forecastandstationportrait/6260/';
            }
        </script>

        ";
    }
}