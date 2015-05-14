<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 22-04-2015
 * Time: 17:31
 */
include_once(__DIR__.'/../sec/encrypt-decrypt.php');

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='fereg'){
    $org_id         =   $_REQUEST['oi'];
    $account_type   =   $_REQUEST['at'];
    $first_name     =   $_REQUEST['fn'];
    $last_name      =   $_REQUEST['ln'];
    $cell_phone     =   $_REQUEST['mn'];
    $email_id       =   $_REQUEST['em'];
    $user_name      =   $_REQUEST['em'];
    $pwdTxt         =   $_REQUEST['pd'];

    $salt           =   substr(strrev(uniqid()),0,5);
    $pwd            =   encrypt_decrypt('encrypt',$pwdTxt,$salt);

    $stts           =   1;

    $id             =   0;

    $pdo->beginTransaction();

    $sql = 'INSERT INTO users(org_id,usr_type_id,usr_nm,pwd,salt,stts) values(:org_id,:usr_type_id,:usr_nm,:pwd,:salt,:stts)';
    $stmt = $pdo->prepare($sql);

    $res = $stmt->execute(array(
        ':org_id'=>$org_id,
        ':usr_type_id'=>$account_type,
        ':usr_nm'=>$user_name,
        ':pwd'=>$pwd,
        ':salt'=>$salt,
        ':stts'=>$stts
    ));

    if($res){$id = $pdo->lastInsertId();}

    if($id>0) {
        if ($account_type == 2) {
            //For Employees
            $sql = "INSERT INTO worker_details(usr_id,fnm,lnm,cntct_num1,email1) VALUES(:usr_id,:fnm,:lnm,:cntct_num1,:email1)";
            $stmt = $pdo->prepare($sql);
            $params = array(':usr_id'=>$id,':fnm'=>$first_name,':lnm'=>$last_name,':cntct_num1'=>$cell_phone,':email1'=>$email_id);
            $res = $stmt->execute($params);
            if($res){
                $pdo->commit();
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'You have been successfully registered. Please proceed to login.')));
            }
            else{
                $pdo->rollBack();
                echo json_encode(array('response'=>array('code'=>'0x00051','resp_msg'=>'Account registration FAILED...')));
            }
        }
        elseif ($account_type == 3) {
            //For Employers
            $sql = "INSERT INTO employer_details(usr_id,cntct_prsn_fnm,cntct_prsn_lnm,cntct_num1,email1) VALUES(:usr_id,:cntct_prsn_fnm,:cntct_prsn_lnm,:cntct_num1,:email1)";
            $stmt = $pdo->prepare($sql);
            $params = array(':usr_id'=>$id,':cntct_prsn_fnm'=>$first_name,':cntct_prsn_lnm'=>$last_name,':cntct_num1'=>$cell_phone,':email1'=>$email_id);
            $res = $stmt->execute($params);
            if($res){
                $pdo->commit();
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'Account has been registered. Please proceed to login.')));
            }
            else{
                $pdo->rollBack();
                echo json_encode(array('response'=>array('code'=>'0x00052','resp_msg'=>'Account creation FAILED...')));
            }
        }
        else{
            $pdo->rollBack();
            echo json_encode(array('response'=>array('code'=>'0x00053','resp_msg'=>'Invalid Account Type')));
        }
    }else{
        $pdo->rollBack();
        echo json_encode(array('response'=>array('code'=>'0x0004','resp_msg'=>'User Creation failed.')));
    }
}