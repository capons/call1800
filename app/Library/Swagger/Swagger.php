<?php
namespace App\Library\Swagger;

class Swagger {
    protected $access_token = 'v3Kdfwwd1lWgAIMlZ7ZC796dTua2IfNQiybw9qKx';
    protected $tfn = array();    //array containes Toll Free number
    /*
    public function __construct()
    {
        $this->access_token = 'v3Kdfwwd1lWgAIMlZ7ZC796dTua2IfNQiybw9qKx';
    }
    */

    /**
     * @return mixed|null
     */
    public function getState() //get all state prefix
    {
        $ch = curl_init('http://portal.opentact.org:80/api/did/availabilitystate?access_token='.$this->access_token); //url to send json -> to NovaPoshta -> got city id for details
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); //set method
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //on local server
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //on local server
        /*
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        */
        $result = curl_exec($ch);                       //curl result
        curl_close($ch);

        if(empty($result)) {
            $result = null; //if empty result
        } else {
            $result = json_decode($result, true);       //return all state
        }
        return $result;
    }

    /**
     * @param $state
     * @return array|mixed|null
     */
    public  function getTFN($state) //get state Toll Free Number
    {

        $ch = curl_init('http://portal.opentact.org:80/api/did/searchUSTFdid?access_token='.$this->access_token.'&state='.$state); //url to send json -> to NovaPoshta -> got city id for details
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); //set method
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //on local server
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //on local server

        $result = curl_exec($ch);                       //curl result
        curl_close($ch);

        if(empty($result)) {
            $result = null; //if empty result
        } else {
            $result = json_decode($result, true);       //return all state
            foreach($result as $row){
                $this->tfn[] = $row['TN'];
            }
        }
        if(!empty($this->tfn)){
            return $this->tfn; //return all State Toll Free Number
        } else {
            return $result;   //return if empty Toll Free Number
        }
    }

}