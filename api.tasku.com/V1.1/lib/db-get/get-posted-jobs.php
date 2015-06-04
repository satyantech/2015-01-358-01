<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 13-05-2015
 * Time: 12:19
 */

    if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']) {
    $pdo->exec('SET SESSION group_concat_max_len = 1000');
        $usr_id=$_REQUEST['usr_id'];
        $sql="SELECT
                j.id JOB_ID,
                DATE(j.posted_on) POSTED_ON,
                j.job_ttl JOB_TITLE,
                j.emplyr_id,
                j.job_ttl JOB_TITLE,
                j.resp RESP,
                j.job_desc_sort DESC_SORT,
                j.job_desc_long DESC_LONG,
                j.strt_dt START_DATE,
                j.end_dt END_DATE,
                j.min_pay EMP_GET,
                j.max_pay EMPR_GIVE,
                j.shift_charges SHIFT_CHARGES_PROVIDED,
                j.is_active IS_ACTIVE,
                j.last_dt_appl APPLY_LAST_DATE,
                j.othr_org_nm EMPLOYER_NAME,
                j.othr_org_addr ADDR,
                j.othr_org_pstl_cd POSTAL_CODE,
                j.othr_org_phone CONTACT,
                j.othr_org_website WEB_SITE,
                j.is_othr_org,
                bt.type_nm EMPLOYER_BUSINESS,
                GROUP_CONCAT(js.skill) SKILLS,
                COALESCE(ap.ap_cnt,0) APPLICATIONS_RECEIVED,
                jt.type_nm JOB_TYPE
            FROM jobs j
            LEFT JOIN job_skills js ON js.job_id = j.id
            LEFT JOIN (SELECT job_id,count(id) ap_cnt FROM applications) ap ON ap.job_id = j.id
            INNER JOIN job_types jt ON jt.id = j.job_type_id
            INNER JOIN users u ON  u.id = j.emplyr_id
            INNER JOIN employer_details ed ON ed.usr_id = u.id
            INNER JOIN business_types bt ON  bt.id = j.othr_org_bsnss
            where j.is_deleted=0 AND j.emplyr_id = ".$usr_id."
            GROUP BY j.id";

        try{
            $stmt= $pdo->query($sql);
            //echo json_encode($pdo->errorInfo());exit;
            if($stmt->rowCount()>0){
                $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records,'sql'=>$sql)));
            }else{
                echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Error while retrieving Job Records')));
            }
        }catch (Exception $e){
            echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Error while retrieving Job Records')));
        }

}