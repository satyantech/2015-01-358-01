<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 05-05-2015
 * Time: 13:47
 */
$cols = array(
    'o'=>'billing_name',
    'a'=>'billing_addr',
    'p'=>'billing_pstl_cd',
    'e'=>'billing_email',
    's'=>'same_billing_addr'
);
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id'] && isset($_REQUEST['be'])){
    $sql =  "UPDATE employer_details set bill_by_email = ".$_REQUEST['v']." WHERE usr_id=".$_REQUEST['usr_id'];
    try{
        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00UF','resp_msg'=>'Record Updation Failed '.$sql)));
        }
    }catch(Exception $ex){
        echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Exception while updating record ...')));
    }

}else if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id'] && is_numeric($_REQUEST['usr_id'])){

    $fields =   explode(',',$_REQUEST['fields']);
    $vals   =   explode(',',$_REQUEST['vals']);
    $uid    =   $_REQUEST['usr_id'];

    $sql = 'UPDATE employer_details SET ';
    $i =0;

    foreach($fields as $f){
        $sql .= $cols[$f]."='".$vals[$i]."',";
        $i++;
    }
    $sql = rtrim($sql ,',').' WHERE usr_id = '.$uid;

    try{
        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00UF','resp_msg'=>'Record Updation Failed ')));
        }
    }catch(Exception $ex){
        echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Exception while updating record ...')));
    }
}