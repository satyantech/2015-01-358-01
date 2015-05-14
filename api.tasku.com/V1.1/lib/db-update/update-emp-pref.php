<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 02-05-2015
 * Time: 12:04
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $setting = $_REQUEST['field'];
    $value = $_REQUEST['val'];

    $sql = "UPDATE worker_preferences SET value='$value' WHERE usr_id=$usr_id AND setting='$setting'";
    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Error while updating preferences')));
    }
}