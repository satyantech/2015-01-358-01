<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 20:26
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $uid = $_REQUEST['usr_id'];
    $skills  = $_REQUEST['skills'];
    $skills_arr = explode(',',$skills);
    $sql = 'INSERT INTO worker_skills(wrkr_id,skill) VALUES';
    $records = '';
    foreach($skills_arr as $skill){
        $records .= "($uid,'$skill'),";
    }
    $records = rtrim($records,',');
    $sql .= $records;

    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Error while saving skill record(s)...')));
    }

}