<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 30-04-2015
 * Time: 01:27
 */
if(isset($_REQUEST['usr_id']) && isset($_REQUEST['job_id'])) {
    $wrkr_id = $_REQUEST['usr_id'];
    $job_id = $_REQUEST['job_id'];
   /* $sql = "SELECT * FROM users u INNER JOIN applications a ON a.wrkr_id=u.id 
    							 INNER JOIN worker_details wd ON wd.usr_id = u.id 
    							    							 
    							 WHERE u.id = $uid AND a.job_id= $job_id" ;   */
    
	   $sql = "SELECT
                wd.usr_id CANDIDATE_ID,
                ap.job_id JOB_ID,
                CONCAT(wd.fnm,' ',wd.lnm) NAME,
                wd.cntct_addr ADDRESS,
                wd.pstl_cd POSTAL_CODE,
                wd.cntct_num1 CONTACT_NUMBER,
                wd.email1 EMAIL,
                wd.account_number_iban IBAN,
                wd.profile_pic PROFILE_PIC,
                wd.dscrptn DESCRIPTION,
                GROUP_CONCAT(DISTINCT CONCAT(wed.id,',',et.type_nm,',',wed.subject,',',wed.experties) SEPARATOR ' | ') EDUCATIONS,
                GROUP_CONCAT(DISTINCT CONCAT(wex.dsgntn,',',wex.org_nm,',',wex.`from`,',',wex.`to`) SEPARATOR ' | ') EXPERIENCES,
                GROUP_CONCAT(DISTINCT CONCAT(wdoc.doc_type_id,',',wdoc.doc_path) SEPARATOR ' | ') DOCS,
                GROUP_CONCAT(DISTINCT ws.skill) SKILLS
                FROM worker_details wd
                INNER JOIN applications ap ON ap.wrkr_id = wd.usr_id AND ap.job_id = $job_id
                LEFT JOIN worker_education_details wed ON wed.usr_id = wd.usr_id
                INNER JOIN education_types et ON et.id = wed.edu_type_id
                LEFT JOIN worker_experiences wex ON wex.usr_id = wd.usr_id
                LEFT JOIN worker_docs wdoc ON wdoc.usr_id = wd.usr_id
                LEFT JOIN worker_skills ws ON ws.wrkr_id = wd.usr_id
                WHERE wd.usr_id = $wrkr_id";
    
    $stmt = $pdo->query($sql);
    
    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','applicant_data'=>$row)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00FE','resp_msg'=>'Error in fetching details...')));
    }
}