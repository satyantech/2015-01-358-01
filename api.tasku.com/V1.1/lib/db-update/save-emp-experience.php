<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 23:42
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $desig = $_REQUEST['desig'];
    $org = $_REQUEST['org'];
    $from = $_REQUEST['from'];
    $to = $_REQUEST['to'];

    $sql = "INSERT INTO worker_experiences(`usr_id`,`dsgntn`,`org_nm`,`from`,`to`) VALUES($usr_id,'$desig','$org','$from','$to')";
    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Experience Data could not be saved...')));
    }
}