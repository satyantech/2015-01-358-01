<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 20:26
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $uid = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM worker_skills WHERE wrkr_id = $uid";
    $stmt = $pdo->query($sql);
    if($stmt->rowCount() > 0){
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Error while fetching skill record(s)...')));
    }

}