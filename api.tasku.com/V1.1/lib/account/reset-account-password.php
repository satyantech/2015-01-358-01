<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 21-05-2015
 * Time: 17:30
 */
include_once(__DIR__.'/../sec/encrypt-decrypt.php');

if(isset($_REQUEST['k']) && $_REQUEST['k']=='Ax84fg!@dgQ'){

    $pwdTxt         =   substr(strrev(uniqid()),0,8);
    $salt           =   substr(strrev(uniqid()),0,5);
    $pwd            =   encrypt_decrypt('encrypt',$pwdTxt,$salt);
    $usr_nm         =   $_REQUEST['e'];

    $sql = "UPDATE users SET pwd='$pwd',salt='$salt' WHERE usr_nm='$usr_nm'";

    if($pdo->exec($sql)){
        echo json_encode(array('response'=>array('code'=>'0x0000','pwd'=>$pwdTxt)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00ER2')));
    }
}else{
    echo json_encode(array('response'=>array('code'=>'0x00ER1')));
}