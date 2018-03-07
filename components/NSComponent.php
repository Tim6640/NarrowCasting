<?php
/**
 * Created by PhpStorm.
 * User: tbeek6640
 * Date: 5-3-2018
 * Time: 16:29
 */

namespace components;

class NSComponent
{
    private $_url;

    public function __construct($url)
    {
        $this->_url = $url;
    }

    public function parseXml() {
        $xml = simplexml_load_file($this->_url);
        print_r($xml);
    }
}