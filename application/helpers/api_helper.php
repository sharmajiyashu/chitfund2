<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('callAPI')) {
	
	function callAPI($method,$url,$postdata = array(),$params_arr = array()){
        $url = 'https://localhost/chitfund_api2/Api/'.$url;
        if($method == 'POST'){
            $headers = array(
                "Content-Type: application/json"
            );
        
            if ($url){
                $Curl_Session = curl_init($url);
                curl_setopt($Curl_Session, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($Curl_Session, CURLOPT_POST, true);
                curl_setopt($Curl_Session, CURLOPT_POSTFIELDS, json_encode($postdata));
                curl_setopt($Curl_Session, CURLOPT_CONNECTTIMEOUT, 12);
                curl_setopt($Curl_Session, CURLOPT_TIMEOUT, 12); //timeout in seconds
                curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($Curl_Session, CURLOPT_SSL_VERIFYPEER, false); // skip ssl certificate verification
                $curlResponse = curl_exec($Curl_Session);
                $curlcode = curl_getinfo($Curl_Session, CURLINFO_HTTP_CODE);
                if (curl_error($Curl_Session)) {
                    $curlResponse .= '#error:' . curl_error($Curl_Session);
                }
                curl_close($Curl_Session);
            } else {
                $curlResponse = "InvalidURL";
            }
            return $curlResponse;
        } else {
            $ch = curl_init();
            if(!empty($params_arr)){
                $data = http_build_query($params_arr);
                $getUrl = $url."?".$data;
            }else{
               $getUrl = $url;  
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $getUrl);
            curl_setopt($ch, CURLOPT_TIMEOUT, 80);
            $data_1 = curl_exec($ch);
            return $data_1;
        }
    }

}