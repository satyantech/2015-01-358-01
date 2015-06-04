<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 28-05-2015
 * Time: 12:05
 */

if(isset($_REQUEST['usr_id']) && is_numeric($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $job_id = $_REQUEST['job_id'];

    $sql = "SELECT j.*,GROUP_CONCAT(js.skill) SKILLS FROM jobs j LEFT JOIN job_skills js ON js.job_id = j.id WHERE j.id = $job_id";
    $stmt = $pdo->query($sql);
    if($stmt->rowCount()==1){
        $job_record = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','record'=>$job_record)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00NR','resp_msg'=>'No Records...')));
    }
}