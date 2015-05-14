<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 08-04-2015
 * Time: 10:53
 */


if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='LISTJ'){
        $emr_id = $_REQUEST['emr'];
        $sql    =   "SELECT
                            j.id job_id,
                            j.job_type_id job_type,
                            emr.usr_id employer_id,
                            j.job_ttl title,
                            j.resp responsibilities,
                            j.job_desc_long description,
                            j.strt_dt start_date,
                            j.end_dt end_date,
                            j.min_pay employee_gets,
                            j.max_pay employer_gives,
                            j.is_othr_org is_other_org,
                            j.othr_org_nm other_org_name,
                            j.othr_org_bsnss other_b_types,
                            j.othr_org_addr other_b_address,
                            j.othr_org_pstl_cd other_b_postal_code,
                            j.othr_org_phone other_b_phone,
                            j.othr_org_website other_b_website
                        FROM jobs j
                        INNER JOIN employer_details emr ON emr.id = j.emplyr_id
                        WHERE j.emplyr_id = $emr_id AND j.is_active=1";
        //echo $sql;
        $stmt_count = $pdo->query($sql);
        $total_records = $stmt_count->rowCount();

        $limit = "";

        if(isset($_REQUEST['limited']) && $_REQUEST['limited']==1){
            if(isset($_REQUEST['records'])){
                $limit = " LIMIT ".$_REQUEST['records'];
            }elseif(isset($_REQUEST['str']) && isset($_REQUEST['nor'])){
                $limit = " LIMIT ".$_REQUEST['str'].",".$_REQUEST['nor'];
            }
        }

        $sql .= $limit;

        $stmt = $pdo->query($sql);
        if($stmt) {
            if ($stmt->rowCount() > 0) {
                $records = $stmt->fetchAll();
                echo json_encode(array('response' => array('out' => 'Success', 'error' => '0', 'data' => $records, 'record_count' => $total_records)));
            } else {
                echo json_encode(array('response' => array('out' => 'No Records!', 'error' => 'No records found!')));
            }
        }else{
            echo json_encode(array('response' => array('out' => 'Error', 'error' => 'Error fetching records!')));
        }
}

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='dlj') {
    $jid = $_REQUEST['jid'];
    $emr_id = $_REQUEST['emr'];

    $pdo->exec("SET foreign_key_checks=0");
    $pdo->beginTransaction();
    if($pdo->exec("DELETE FROM job_skills WHERE job_id=$jid")) {
        $sql = "DELETE FROM jobs WHERE id=$jid AND emplyr_id = $emr_id";
        $isOk = $pdo->exec($sql);
        if ($isOk) {
            echo json_encode(array('response' => array('out' => 'Success', 'error' => 'Record Deleted Successfully')));
            $pdo->commit();
        } else {
            echo json_encode(array('response' => array('out' => 'Error', 'error' => 'Some error while deleting the record!')));
            $pdo->rollBack();
        }
    }else{
        $pdo->rollBack();
    }
    $pdo->exec("SET foreign_key_checks=1");
}