<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 5-3-2018
 * Time: 11:52
 */
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

        $NsItemArray = array();

        $count = -1;

        echo "<table class='table table-striped'>";
        
        echo "<h3 style='color: #040156; font-weight: bold; font-size: 30px;'>Vertrektijden vanaf station Harderwijk.<i><img id='NSlogo' src='../assets/img/ns_logo_1.png' /></i></h3>";

        echo "<thead>

                <tr align='center' style='background-color: #FEF6E1;'>
                
                    <th>Ritnummer <i class='fas fa-hashtag'></i></th>
                    
                    <th>Tijd <i class='far fa-clock'></i></th>
                    
                    <th>Eind bestemming <i class='far fa-building'></i></th>
                    
                    <th>Trein <i class='fas fa-train'></i></th>
                                        
                    <th>Vervoerder <i class='far fa-user'></i></th>
                    
                    <th>Spoor <i class='fas fa-road'></i></th>
                
                </tr>
                
              </thead>";

        foreach($result->VertrekkendeTrein as $NSitem){

            if($count % 2 == 0 )
            {
                $rowColour = '#FEF6E1';

            }else{

                $rowColour = '#FFFFFF';

            }

            echo "<tr id='" . $count . "' align='center' style='background-color: " . $rowColour . ";'>";

            array_push($NsItemArray, $NSitem);

            $count++;

            echo "<td>" . $NsItemArray[$count]->RitNummer . "</td>";

            echo "<td>" . substr($NsItemArray[$count]->VertrekTijd, 11, -8) . "</td>";

            echo "<td>" . $NsItemArray[$count]->EindBestemming . "</td>";

            echo "<td><img src='../assets/img/ns-logo.png'/> " . $NsItemArray[$count]->TreinSoort . "</td>";

            echo "<td>" . $NsItemArray[$count]->Vervoerder . "</td>";

            echo "<td>" . $NsItemArray[$count]->VertrekSpoor . "</td>";

            echo "</tr>";

        }

        echo "</table>";

    }
}