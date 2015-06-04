<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 29-05-2015
 * Time: 11:38
 */

if(isset($_REQUEST['usr_id']) && is_numeric($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    $sql = "
        SELECT ap.job_id JOB_ID,j.job_ttl JOB_TITLE, COUNT(ap.id) CNT
        FROM applications ap
        INNER JOIN jobs j ON j.id = ap.job_id
        INNER JOIN users u ON u.id = j.emplyr_id
        WHERE j.is_active = 1 AND j.is_deleted = 0 AND j.last_dt_appl >= now()
        AND ap.appl_dt <= now() AND j.emplyr_id = $usr_id
        GROUP BY ap.job_id
    ";
    $stmt = $pdo->query($sql);
    //echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'No Records','sql'=>$sql)));exit;
    if($stmt->rowCount()>0) {
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'No Records')));
        
    }
}