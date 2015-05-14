<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 02-05-2015
 * Time: 14:18
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];

    $sql = "SELECT setting,value FROM worker_preferences WHERE usr_id = $usr_id";
    $stmt = $pdo->query($sql);

    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($records && $stmt->rowCount() > 0){
       echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Error in fetching preferences')));
    }

}