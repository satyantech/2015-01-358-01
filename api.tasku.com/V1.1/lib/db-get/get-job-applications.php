<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 29-05-2015
 * Time: 16:09
 */


if(isset($_REQUEST['usr_id']) && is_numeric($_REQUEST['usr_id']) && $_REQUEST['usr_id'] && isset($_REQUEST['job_id'])){

$job_id = $_REQUEST['job_id']?$_REQUEST['job_id']:0;
$usr_id = $_REQUEST['usr_id'];
$sql = "SELECT
                ap.job_id JOB_ID,
                ap.wrkr_id WORKER_ID,
                j.job_ttl JOB_TITLE,
                wd.fnm FIRST_NAME,
                wd.lnm LAST_NAME,
                wd.cntct_num1 CONTACT_NUM,
                wd.email1 EMAIL,
                ap.appl_dt APPLIED_ON,
                GROUP_CONCAT(ws.skill) SKILLS
                FROM applications ap
                INNER JOIN jobs j ON j.id = ap.job_id
                INNER JOIN users u ON u.id = j.emplyr_id
                INNER JOIN worker_details wd ON wd.usr_id = ap.wrkr_id
                INNER JOIN worker_skills ws ON ws.wrkr_id = ap.wrkr_id
                LEFT JOIN application_view av ON av.application_id = ap.id
                WHERE j.emplyr_id = $usr_id
";
if($job_id>0) {
$sql .= " AND j.id = $job_id";
    }
$sql .= " GROUP BY ap.id
            ORDER BY ap.appl_dt DESC
    ";
$stmt = $pdo->query($sql);
if($stmt->rowCount()>0) {
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
    }else{
echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'No Records / Invalid Job')));
    }

}

