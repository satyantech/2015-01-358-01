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
        $sql = "SELECT j.id JOB_ID,
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
        COUNT(ap.id) HAS_APPLIED
FROM jobs j
INNER JOIN job_skills js ON js.job_id = j.id
INNER JOIN worker_skills ws ON ws.skill = js.skill
INNER JOIN job_types jt ON jt.id = j.job_type_id
INNER JOIN business_types bt ON j.othr_org_bsnss = bt.id
LEFT JOIN applications ap on ap.job_id = j.id and ap.wrkr_id = ws.wrkr_id
WHERE ws.wrkr_id = $usr_id
group by j.id;";

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