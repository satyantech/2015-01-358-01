<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 11-05-2015
 * Time: 19:44
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id =$_REQUEST['usr_id'];
    $j=$_REQUEST['j'];
    $jt=$_REQUEST['jt'];
    $std=$_REQUEST['std'];
    $end=$_REQUEST['end'];
    $eg=$_REQUEST['eg'];
    $erg=$_REQUEST['erg'];
    $sc=$_REQUEST['sc'];
    $bn=$_REQUEST['bn'];
    $bt=$_REQUEST['bt'];
    $ba=$_REQUEST['ba'];
    $bp=$_REQUEST['bp'];
    $bc=$_REQUEST['bc'];
    $ws=$_REQUEST['ws'];
    $br=$_REQUEST['br'];
    $jd=$_REQUEST['jd'];
    $mr=$_REQUEST['mr'];
    $ld=$_REQUEST['ld'];

    //by default the paymode is in this version is 1:Other (payment_mode table relationship)
    $payment_mode = 1;
    $pdo->beginTransaction();
    $sql = "INSERT INTO jobs(job_type_id,emplyr_id,pay_mode_id,job_ttl,resp,job_desc_sort,job_desc_long,strt_dt,end_dt,min_pay,max_pay,shift_charges,is_active,last_dt_appl,
            job_st_time,job_end_time,othr_org_nm,othr_org_bsnss,othr_org_addr,othr_org_pstl_cd,othr_org_phone,othr_org_website,is_othr_org)
            VALUES ($jt,$usr_id,$payment_mode,'$j','$jd','','$jd','$std','$end',$eg,$erg,$sc,1,'$ld','','','$bn',$bt,'$ba','$bp','$bc','$ws',$br)";
    if($pdo->exec($sql)){
        $jid = $pdo->lastInsertId();
        $skills = explode(',',$mr);
        $data = '';
        foreach($skills as $s){
            $data .= "($jid,'$s'),";
        }
        $data = rtrim($data,',');
        $sql = "INSERT INTO job_skills(job_id,skill) VALUES $data";
        if($pdo->exec($sql)){
            $pdo->commit();
            echo json_encode(array('response'=>array('out'=>'0x0000','resp_msg'=>'')));
        }else{
            $pdo->rollBack();
            echo json_encode(array('response'=>array('out'=>'0x00E2','resp_msg'=>'Some error occurred while storing the skills data ')));
        }
    }else{
        $pdo->rollBack();
        echo json_encode(array('response'=>array('out'=>'0x00EX','resp_msg'=>'Some error occurred while storing the record ||| '.$sql.' ||| '.json_encode($pdo->errorInfo()))));
    }
}