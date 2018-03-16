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

        echo "<table class='table table-striped table-responsive'>";

        echo "<thead>

                <tr>
                
                    <th scope='col'>RitNummer</th>
                    
                    <th scope='col'>VertrekTijd</th>
                    
                    <th scope='col'>EindBestemming</th>
                    
                    <th scope='col'>TreinSoort</th>
                                        
                    <th scope='col'>Vervoerder</th>
                    
                    <th scope='col'>VertrekSpoor</th>
                
                </tr>
                
              </thead>";

        foreach($result->VertrekkendeTrein as $NSitem){

            echo "<tr>";

            array_push($NsItemArray, $NSitem);

            $count++;

            echo "<td class='col'>" . $NsItemArray[$count]->RitNummer . "</td>";

            echo "<td class='col'>" . substr($NsItemArray[$count]->VertrekTijd, 11, -8) . "</td>";

            echo "<td class='col'>" . $NsItemArray[$count]->EindBestemming . "</td>";

            echo "<td class='col'>" . $NsItemArray[$count]->TreinSoort . "</td>";

            echo "<td class='col'>" . $NsItemArray[$count]->Vervoerder . "</td>";

            echo "<td class='col'>" . $NsItemArray[$count]->VertrekSpoor . "</td>";

            echo "</tr>";

        }

        echo "</table>";

    }
}

?>