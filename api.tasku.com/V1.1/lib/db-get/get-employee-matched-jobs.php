<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 18-05-2015
 * Time: 15:07
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']) {
    try{

        $usr_id = $_REQUEST['usr_id'];
        $sql = "SELECT
        GROUP_CONCAT(js.skill) SKILLS,
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
        COALESCE(ap.ap_cnt,0) HAS_APPLIED

        FROM `worker_skills` ws

        INNER JOIN job_skills js ON js.skill = ws.skill
        INNER JOIN jobs j ON j.id = js.job_id
        INNER JOIN job_types jt ON jt.id = j.job_type_id
        INNER JOIN business_types bt ON j.othr_org_bsnss = bt.id
        LEFT JOIN (SELECT count(id) ap_cnt,wrkr_id,job_id FROM applications) ap ON ap.wrkr_id = ws.wrkr_id AND ap.job_id = j.id
        WHERE ws.wrkr_id = $usr_id
        GROUP BY js.job_id";

        $stmt = $pdo->query($sql);

        if($stmt){
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00NR','resp_msg'=>'No Records... ||| '.$sql)));
        }
    }
    catch(Exception $ex){
        echo json_encode(array('response'=>array('code'=>'0x00NR','resp_msg'=>'No Records... ||| '.$sql)));
    }
}