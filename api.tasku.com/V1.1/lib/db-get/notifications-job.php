<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 25-05-2015
 * Time: 15:29
 */
if(isset($_REQUEST['usr_id']) && is_numeric($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id = $_REQUEST['usr_id'];
    //$limit = $_REQUEST['limit']?$_REQUEST['limit']:'';
    $sql = "SELECT
                j.id JOB_ID,
                j.job_ttl JOB_TITLE,
                DATE(j.posted_on) POSTED_ON,
                j.last_dt_appl LAST_DATE,
                j.othr_org_nm EMPLOYER
            FROM jobs j

            INNER JOIN job_skills js ON js.job_id = j.id
            INNER JOIN worker_skills ws ON ws.skill = js.skill
            WHERE j.id NOT IN (SELECT job_id FROM applications where wrkr_id = $usr_id) AND ws.wrkr_id = $usr_id AND j.is_active = 1 AND j.is_deleted = 0 AND j.last_dt_appl >= NOW()
            GROUP BY j.id,ws.wrkr_id
            ORDER BY j.posted_on DESC
            LIMIT 10";
    $stmt = $pdo->query($sql);
    if($stmt->rowCount()>0){
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00NR','resp_msg'=>'No Records')));
    }

}else{
    echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Invalid Call to function')));
}