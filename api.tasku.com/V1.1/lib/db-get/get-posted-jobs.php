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
    $sql="select
                DATE(j.posted_on) POSTED_ON,
                j.id JOB_ID,
                job_type_id,
                jt.type_nm JOB_TYPE,
                emplyr_id,
                job_ttl JOB_TITLE,
                resp RESP,
                job_desc_sort DESC_SORT,
                job_desc_long DESC_LONG,
                strt_dt START_DATE,
                end_dt END_DATE,
                min_pay EMP_GET,
                max_pay EMPR_GIVE,
                shift_charges SHIFT_CHARGES_PROVIDED,
                is_active IS_ACTIVE,
                last_dt_appl APPLY_LAST_DATE,
                othr_org_nm EMPLOYER_NAME,
                bt.type_nm EMPLOYER_BUSINESS,
                othr_org_addr ADDR,
                othr_org_pstl_cd POSTAL_CODE,
                othr_org_phone CONTACT,
                othr_org_website WEB_SITE,
                is_othr_org,
                js.skills SKILLS,
                COALESCE(ap.ap_cnt,0) APPLICATIONS_RECEIVED
            -- ,group_concat(',',js.skill) skills,
            -- count(ap.id) app_count,
            from jobs j
            INNER JOIN users u ON j.emplyr_id = u.id
            INNER JOIN employer_details ed ON ed.usr_id = u.id
            INNER JOIN job_types jt ON jt.id = j.job_type_id
            INNER JOIN business_types bt ON j.othr_org_bsnss = bt.id
            -- LEFT JOIN job_skills js ON js.job_id = j.id
            -- LEFT JOIN applications ap ON ap.job_id = j.id
            LEFT JOIN (select job_id,group_concat(skill) skills from job_skills) js ON js.job_id = j.id
            LEFT JOIN (select job_id,count(id) ap_cnt from applications) ap ON ap.job_id = j.id
            where j.emplyr_id = ".$usr_id;

        try{
            $stmt= $pdo->query($sql);
            //echo json_encode($pdo->errorInfo());exit;
            if($stmt->rowCount()>0){
                $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
            }else{
                echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Error while retrieving Job Records')));
            }
        }catch (Exception $e){
            echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Error while retrieving Job Records')));
        }

}