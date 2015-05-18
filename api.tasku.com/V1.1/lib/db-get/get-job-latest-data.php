<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 15-05-2015
 * Time: 16:29
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']) {
    $usr_id = $_REQUEST['usr_id'];
    $rid    = $_REQUEST['rid'];
    $sql = "select
                DATE(j.posted_on) POSTED_ON,
                j.id JOB_ID,
                job_type_id,
                jt.type_nm JOB_TYPE,
                emplyr_id,
                job_ttl JOB_TITLE,
                resp RESP,
                job_desc_sort DESC_SORT,
                job_desc_long DESC_LONG,
                DATE_FORMAT(strt_dt,'%d-%m-%Y') START_DATE,
                DATE_FORMAT(end_dt,'%d-%m-%Y') END_DATE,
                min_pay EMP_GET,
                max_pay EMPR_GIVE,
                shift_charges SHIFT_CHARGES_PROVIDED,
                is_active IS_ACTIVE,
                DATE_FORMAT(last_dt_appl,'%d-%m-%Y') APPLY_LAST_DATE,
                othr_org_nm EMPLOYER_NAME,
                bt.type_nm EMPLOYER_BUSINESS,
                othr_org_addr ADDR,
                othr_org_pstl_cd POSTAL_CODE,
                othr_org_phone CONTACT,
                othr_org_website WEB_SITE,
                is_othr_org,
                js.skills SKILLS,
                COALESCE(ap.ap_cnt,0) APPLICATIONS_RECEIVED

            from jobs j
            INNER JOIN users u ON j.emplyr_id = u.id
            INNER JOIN employer_details ed ON ed.usr_id = u.id
            INNER JOIN job_types jt ON jt.id = j.job_type_id
            INNER JOIN business_types bt ON j.othr_org_bsnss = bt.id

            LEFT JOIN (select job_id,group_concat(skill) skills from job_skills) js ON js.job_id = j.id
            LEFT JOIN (select job_id,count(id) ap_cnt from applications) ap ON ap.job_id = j.id
            where j.is_deleted=0 AND j.emplyr_id =$usr_id AND j.id=$rid";

            $stmt = $pdo->query($sql);

            if($stmt->rowCount()>0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','record'=>$row)));
            }else{
                echo json_encode(array('response'=>array('code'=>'0x00ER','resp_msg'=>'Error while retriving record! ||| '.$sql)));
            }
}