<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 17-03-2015
 * Time: 15:46
 * Desc: This file is used to update the employee profile data
 */


/************************************************************************************************************************/

$segments_fields = array(
    'per_det'=>array(
        'table'=> 'worker_details',
        'fields'=> array(
            'fname'=>'fnm',
            'lname'=>'lnm',
            'postal_addr'=>'cntct_addr',
            'postal_code'=>'pstl_cd',
            'phone_num'=>'cntct_num1',
            'email_primary'=>'email1',
            'ac_num'=>'account_number_iban',
            'description'=>'dscrptn'
        )
    ),
    'edu_det'=>array(
        'table'=> 'worker_education_details',
        'fields'=> array(
            'user_id'=>'usr_id',
            'edu_type'=>'edu_type_id',
            'institution'=>'institution',
            'major'=>'subject',
            'yr'=>'year',
            'grade'=>'grade',
            'experties'=>'experties'
        )
    ),
    'exp_det'=>array(
        'table'=> 'worker_experiences',
        'fields'=> array(
            'user_id'=>'usr_id',
            'role'=>'dsgntn',
            'org'=>'org_nm',
            'start'=>'from',
            'end'=>'to',
            'skills'=>'skills'
        )
    )
);

/************************************************************************************************************************/


//When Request is sent for uploading the profile pic
if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='uppic'){
    $pic = $_REQUEST['pic'];
    $uid = $_REQUEST['uid'];
    $sql = "UPDATE worker_details SET profile_pic='$pic' WHERE usr_id=$uid";
    $rowCount = $pdo->exec($sql);
    if($rowCount > 0){
        echo '{"result":{"message":"Success"}}';
    }else{
        echo '{"result":{"message":"PUEMP:0x001","sql":"'.$sql.'"}}';
    }
}

//When request is sent to update the fields
if(isset($_REQUEST['segment'])){
    $user_id = $_REQUEST['user_id'];
    /*************************** Return Array ****************************/
    $json_arr = array();
    $json_arr = array(
        'response' => array(
            'out' => 'No action taken.'
        )
    );
    /*************************** Return Array ****************************/


    if($_REQUEST['segment']=='edu_det') {
        //first check if any record exists for the user if not insert one

        $sql = "SELECT count(usr_id) cnt FROM worker_education_details WHERE usr_id=$user_id";
        $stmt = $pdo->query($sql);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['cnt'] == 0) {
                $table_2_insert = $segments_fields[$_REQUEST['segment']]['table'];
                $col_2_insert = $segments_fields[$_REQUEST['segment']]['fields'][$_REQUEST['field']];
                $val_2_insert = $_REQUEST['val'];
                $sql = "INSERT INTO $table_2_insert(`usr_id`,`$col_2_insert`) VALUES($user_id,'$val_2_insert')";
                $ret = $pdo->exec($sql);
            }
        }

    }

    $table_2_update = $segments_fields[$_REQUEST['segment']]['table'];
    $col_2_update = $segments_fields[$_REQUEST['segment']]['fields'][$_REQUEST['field']];
    $val_2_update = $_REQUEST['val'];

    $sql = "UPDATE $table_2_update SET $col_2_update = '$val_2_update' WHERE usr_id=$user_id";
    $res = $pdo->exec($sql);

    if ($res) {
        $json_arr['response']['out'] = 'Success';
    } else {
        $json_arr['response']['out'] = 'Record could not be Updated';
    }
    echo json_encode($json_arr);
}

//When Request is sent for uploading the profile documents
if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='docs'){

    $doc        = $_REQUEST['doc'];
    $uid        = $_REQUEST['usr_id'];
    $doc_type   = $_REQUEST['doc_type'];
    $sql        = "UPDATE worker_docs SET doc_path = '$doc' WHERE usr_id=$uid AND doc_type_id='$doc_type'";
    $res        = $pdo->exec($sql);
    if(!$res){
        $sql1    = "INSERT INTO worker_docs(id,usr_id,doc_type_id,doc_path) VALUES(null,$uid,'$doc_type','$doc');";
        $res1 = $pdo->exec($sql1);
        if($res1){
            echo 1;
        }else{
            echo 0;
        }
    }
    else{
        echo 1;
    }
}
?>