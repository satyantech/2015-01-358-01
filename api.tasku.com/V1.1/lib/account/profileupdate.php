<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 28-04-2015
 * Time: 15:11
 */

if(isset($_REQUEST['prof_pic'])){
    $usr_id         = $_REQUEST['usr_id'];
    $pic            = $_REQUEST['prof_pic'];
    $usr_type_id    = $_REQUEST['usr_type_id'];
    $sql = '';

    if($usr_type_id==2){
        $sql = "UPDATE worker_details SET profile_pic = '$pic' WHERE usr_id=$usr_id";
        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'Data Updated Successfully')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0xC0002','resp_msg'=>'Cannot Update Data...')));
        }
    }else{
        echo json_encode(array('response'=>array('code'=>'0xC001','resp_msg'=>'Invalid User Type')));
        exit;
    }

}