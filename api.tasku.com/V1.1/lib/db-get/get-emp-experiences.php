<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 22:52
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM worker_experiences WHERE usr_id = $usr_id";
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($records){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }
    else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'No Records fetched...')));
    }

}