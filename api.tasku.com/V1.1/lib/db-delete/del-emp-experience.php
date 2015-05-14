<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 23:21
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $rid = $_REQUEST['rid'];

    $sql = "DELETE FROM worker_experiences WHERE usr_id = $usr_id AND id = $rid";

    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Record could not be deleted...\n\n'.json_encode($pdo->errorInfo()))));
    }
}