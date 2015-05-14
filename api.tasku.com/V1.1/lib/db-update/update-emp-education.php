<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 17:28
 */

if(isset($_REQUEST['usr_id'])){

        $usr_id         =   $_REQUEST['usr_id'];
        $edu_type_id    =   $_REQUEST['edu_type_id'];
        $stream         =   $_REQUEST['stream'];
        $subjects       =   $_REQUEST['subjects'];

        $sql = "INSERT INTO worker_education_details(usr_id,edu_type_id,subject,experties) VALUES($usr_id,$edu_type_id,'$stream','$subjects')";

        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Error while saving education record.'.json_encode($pdo->errorInfo()))));
        }
}