<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 14-05-2015
 * Time: 12:57
 */
$fields = array(
    'ld'=>'last_dt_appl',
    'sd'=>'strt_dt',
    'ed'=>'end_dt',
    'ww'=>'min_pay',
    'ew'=>'max_pay',
    'tl'=>'job_ttl',
    'ds'=>'job_desc_long',
);

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']) {
    try {
        $usr_id = $_REQUEST['usr_id'];
        $rid = $_REQUEST['rid'];

        $vals = array();

        $vals['ld'] = $_REQUEST['ld']?date('Y-m-d',strtotime($_REQUEST['ld'])):'';
        $vals['sd'] = $_REQUEST['sd']?date('Y-m-d',strtotime($_REQUEST['sd'])):'';
        $vals['ed'] = $_REQUEST['ed']?date('Y-m-d',strtotime($_REQUEST['ed'])):'';
        $vals['ww'] = $_REQUEST['ww'];
        $vals['ew'] = $_REQUEST['ew'];
        $vals['tl'] = $_REQUEST['tl'];
        $vals['ds'] = $_REQUEST['ds'];


        $set = ' SET ';
        foreach ($vals as $k=>$v){
            if ($v != ''){
                $set .= $fields[$k]." = '$v',";
            }
        }
        $set = rtrim($set,',');

        if(strlen($set)>5) {
            $where = " WHERE id=$rid AND emplyr_id=$usr_id";
            $sql = "UPDATE jobs".$set.$where;
            if($pdo->exec($sql)){
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

            from jobs j
            INNER JOIN users u ON j.emplyr_id = u.id
            INNER JOIN employer_details ed ON ed.usr_id = u.id
            INNER JOIN job_types jt ON jt.id = j.job_type_id
            INNER JOIN business_types bt ON j.othr_org_bsnss = bt.id

            LEFT JOIN (select job_id,group_concat(skill) skills from job_skills) js ON js.job_id = j.id
            LEFT JOIN (select job_id,count(id) ap_cnt from applications) ap ON ap.job_id = j.id
            where j.emplyr_id =$usr_id AND j.id=$rid";
                try{

                    $stmt= $pdo->query($sql);
                    if($stmt->rowCount()>0){
                        $record=$stmt->fetch(PDO::FETCH_ASSOC);
                        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','record'=>$record)));
                    }else{
                        echo json_encode(array('response'=>array('code'=>'0x00ER','resp_msg'=>'.Error while retrieving Job Record'.json_encode($pdo->errorInfo()))));
                    }
                }catch (Exception $ex){
                    echo json_encode(array('response'=>array('code'=>'0x00EX2','resp_msg'=>'Exception: ['.$ex->getMessage().']')));
                }
            }else{
                echo json_encode(array('response'=>array('code'=>'0x00ER','resp_msg'=>'..Error while updating Job Record'.json_encode($pdo->errorInfo()),'sql'=>$sql)));
            }
        }
    } catch (Exception $e) {
        echo json_encode(array('response'=>array('code'=>'0x00EX1','resp_msg'=>'Exception: ['.$e->getMessage().']')));
    }
}