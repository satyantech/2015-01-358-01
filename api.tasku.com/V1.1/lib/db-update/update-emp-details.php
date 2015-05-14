<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 02-05-2015
 * Time: 10:21
 */
$fields = array(
    'first_name'    =>  'fnm',
    'last_name'     =>  'lnm',
    'contact_addr'  =>  'cntct_addr',
    'postal_code'   =>  'pstl_cd',
    'phone'         =>  'cntct_num1',
    'email'         =>  'email1',
    'iban'          =>  'account_number_iban',
    'about'         =>  'dscrptn'
);

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $field  = $_REQUEST['field'];
    $val    = $_REQUEST['val'];
    $usr_id = $_REQUEST['usr_id'];

    $sql = "UPDATE worker_details SET ".$fields[$field]."='$val' WHERE usr_id=$usr_id";
    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Data could not be updated')));
    }
}