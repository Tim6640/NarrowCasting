<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 5-3-2018
 * Time: 11:52
 */

namespace components;

use PHPUnit\Framework\Exception;

class NSComponent
{
    private $prop_url;

    private $prop_userName;

    private $prop_password;

    public function __construct($url, $userName, $password)
    {
        $this->prop_url = $url;
        $this->prop_userName = $userName;
        $this->prop_password = $password;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->prop_url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->prop_url = $url;
    }

    /**
     * @return mixed
     */
    public function getPropUserName()
    {
        return $this->prop_userName;
    }

    /**
     * @param mixed $prop_userName
     */
    public function setPropUserName($prop_userName)
    {
        $this->prop_userName = $prop_userName;
    }

    /**
     * @return mixed
     */
    public function getPropPassword()
    {
        return $this->prop_password;
    }

    /**
     * @param mixed $prop_password
     */
    public function setPropPassword($prop_password)
    {
        $this->prop_password = $prop_password;
    }

    /**
     * @return array $xml
     */
    public function parse() {
        $CI = curl_init();
        curl_setopt($CI, CURLOPT_URL, $this->getUrl());
        curl_setopt($CI, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($CI, CURLOPT_USERPWD, "$this->prop_userName:$this->prop_password");
        curl_setopt($CI, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($CI);
        $info = curl_getinfo($CI);
        curl_close($CI);

        if ($info['http_code'] = 200) {
            $result = simplexml_load_string($output) or die("Error: Cannot create object");
        }
        else {
            //throw new Exception($info["http_code"]);
            $result = "exception";
        }
        return $result;
    }

    public function view() {
        $result = $this->parse();
        //https://www.screenimpact.nl/theater/ template

        var_dump($result->VertrekkendeTrein[2]);

        $NsItemArray = array();

        $count = -1;

        foreach($result->VertrekkendeTrein as $NSitem){

            array_push($NsItemArray, $NSitem);

            $count++;

            print_r($NsItemArray[$count]->RitNummer);

        }

        return $NsItemArray;

    }
}

?>

<div class="row">

    <div>

        <?php

        $component = new NSComponent("http://webservices.ns.nl/ns-api-avt?station=Harderwijk", "tbeek6640@student.landstede.nl", "RspRrenSa25njpME8Rcc0slbpvS3RkUk4twK8bWL44vmIxiBU34_0w");
        $component->view();

        ?>

    </div>

</div>
