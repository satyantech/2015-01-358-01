<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 20-05-2015
 * Time: 12:51
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $job_id = $_REQUEST['rid'];
    $sql = "INSERT INTO applications(job_id,wrkr_id) VALUES($job_id,$usr_id)";
    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00ER','resp_msg'=>'Your application to the job could not be stored please try again later. ||| '.$sql.' ||| '.json_encode($pdo->errorInfo()))));
    }
}