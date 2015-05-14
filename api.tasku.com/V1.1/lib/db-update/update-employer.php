<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 05-05-2015
 * Time: 13:47
 */
$fields = array(
    'business_name' => 'bsnss_nm',
    'business_type' => 'business_type',
    'contact_addr' => 'cntct_addr',
    'postalcode' => 'pstl_cd',
    'empr_phone' => 'cntct_num2',
    'website' => 'web_site',
    'fnm' => 'cntct_prsn_fnm',
    'lnm' => 'cntct_prsn_lnm',
    'phone' => 'cntct_num1',
    'email' => 'email1',
    'description'=>'comp_desc',
    'billing_org_name'=>'billing_name',
    'billing_address'=>'billing_addr',
    'billing_postal_code'=>'billing_pstl_cd',
    'business_email'=>'billing_email'
);
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id'] && is_numeric($_REQUEST['usr_id'])){
    $f      = $_REQUEST['field'];
    $v      = $_REQUEST['val'];
    $uid    = $_REQUEST['usr_id'];

    $sql = 'UPDATE employer_details SET '.$fields[$f].'=\''.$v.'\' WHERE usr_id = '.$uid;
    try{
        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00UF','resp_msg'=>'Record Updation Failed '.$sql)));
        }
    }catch(Exception $ex){
        echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Exception while updating record ...')));
    }
}