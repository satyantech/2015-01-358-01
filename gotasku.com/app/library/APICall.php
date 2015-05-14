<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 22-04-2015
 * Time: 21:38
 */
class APICall {
    public static function execute($params){
        try {
            $ch = curl_init(API_URL);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            $out = curl_exec($ch);
            curl_close($ch);
            return $out;
        }
        catch(Exception $ex){
            return json_encode(array('response'=>array('code'=>'0x0ACE','resp_msg'=>'Problem in communication with database...')));
        }
    }
}