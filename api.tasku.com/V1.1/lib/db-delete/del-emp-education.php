<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 18:34
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']!=''){
    $usr_id = $_REQUEST['usr_id'];
    $rid = $_REQUEST['rid'];

    if($pdo->exec("DELETE FROM worker_education_details WHERE id=$rid AND usr_id=$usr_id")){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'Error While deleting the record!')));
    }
}