<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 07-04-2015
 * Time: 11:04
 */

//The job creation can be from the web apps or from the mobile apps
//the sa (sub action) parameter in the REQUEST checks for the same.
if(isset($_REQUEST['sa']) && $_REQUEST['sa'] == 'webapp'){

    $pdo->exec("SET foreign_key_checks=0");

    $stmt = $pdo->prepare("INSERT INTO jobs(job_type_id, emplyr_id, pay_mode_id, job_ttl, resp, job_desc_sort, job_desc_long, strt_dt, end_dt, min_pay, max_pay, last_dt_appl, job_st_time, job_end_time, is_othr_org, othr_org_nm, othr_org_bsnss, othr_org_addr, othr_org_pstl_cd, othr_org_phone, othr_org_website) VALUES(:job_type_id, :emplyr_id, :pay_mode_id, :job_ttl, :resp, :job_desc_sort, :job_desc_long, :strt_dt, :end_dt, :min_pay, :max_pay, :last_dt_appl, :job_st_time, :job_end_time, :is_othr_org, :othr_org_nm, :othr_org_bsnss, :othr_org_addr, :othr_org_pstl_cd, :othr_org_phone, :othr_org_website)");

    $emplyr_id          =   $_REQUEST['emr'];
    $responsibilities	=	$_REQUEST['responsibilities'];
    $jobtype			=	$_REQUEST['jobtype'];
    $start				=	$_REQUEST['start'];
    $end				=	$_REQUEST['end'];
    $employee_get		=	$_REQUEST['employee_get'];
    $employer_give		=	$_REQUEST['employer_give'];
    $includeCharges		=	$_REQUEST['includeCharges'];
    $b_name				=	$_REQUEST['b_name'];
    $business			=	$_REQUEST['business'];
    $b_addr				=	$_REQUEST['b_addr'];
    $b_postal_code		=	$_REQUEST['b_postal_code'];
    $b_phone			=	$_REQUEST['b_phone'];
    $b_website			=	$_REQUEST['b_website'];
    $isOtherOrg			=	$_REQUEST['isOtherOrg'];
    $job_description	=	$_REQUEST['job_description'];
    $skill				=	$_REQUEST['skill'];
    $ldap				=	$_REQUEST['ldap'];

    $pay_mode   = null;
    $null_date  = '0000-00-00';
    $null_time  = '00:00:00';

    $stmt->bindParam(':job_type_id',$jobtype);
    $stmt->bindParam(':emplyr_id',$emplyr_id);
    $stmt->bindParam(':pay_mode_id',$pay_mode);
    $stmt->bindParam(':job_ttl',$responsibilities);
    $stmt->bindParam(':resp',$responsibilities);
    $stmt->bindParam(':job_desc_sort',$job_description);
    $stmt->bindParam(':job_desc_long',$job_description);
    $stmt->bindParam(':strt_dt',$start);
    $stmt->bindParam(':end_dt',$end);
    $stmt->bindParam(':min_pay',$employee_get);
    $stmt->bindParam(':max_pay',$employer_give);
    $stmt->bindParam(':last_dt_appl',$ldap);
    $stmt->bindParam(':job_st_time',$null_time);
    $stmt->bindParam(':job_end_time',$null_time);
    $stmt->bindParam(':is_othr_org',$isOtherOrg);
    $stmt->bindParam(':othr_org_nm',$b_name);
    $stmt->bindParam(':othr_org_bsnss',$business);
    $stmt->bindParam(':othr_org_addr',$b_addr);
    $stmt->bindParam(':othr_org_pstl_cd',$b_postal_code);
    $stmt->bindParam(':othr_org_phone',$b_phone);
    $stmt->bindParam(':othr_org_website',$b_website);
    $pdo->beginTransaction();
    if($stmt->execute()){
        $job_id = $pdo->lastInsertId();
        if($job_id){
            $values='';
            $skills_arr = explode(',',$skill);
            $skill_sql = "INSERT INTO job_skills(job_id,skill) VALUES";
            foreach($skills_arr as $s){
                    $values .= "($job_id,'".$s."'),";
            }
            $values = rtrim($values,',');
            $skill_sql .= $values;
            if($pdo->exec($skill_sql)){
                $pdo->commit();
                echo json_encode(array('response'=>array('out'=>'Success','Error'=>'0')));
            }else{
                $pdo->rollBack();
                echo json_encode(array('response'=>array('out'=>'Error','Error'=>'Skills Cannot be entered into the database')));
            }
        }
    }else{
        $pdo->rollBack();
        echo json_encode(array('response'=>array('out'=>'Error','Error'=>'Error While creating job posting.')));
    }
    $pdo->exec("SET foreign_key_checks=1");
}