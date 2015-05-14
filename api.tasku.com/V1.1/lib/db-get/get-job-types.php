<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 08-05-2015
 * Time: 13:03
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){

    $sql = "SELECT id, type_nm typeName FROM job_types";
    $stmt = $pdo->query($sql);
    if($stmt->rowCount()>0){
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x0001','resp_msg'=>'No Records fetched')));
    }

}