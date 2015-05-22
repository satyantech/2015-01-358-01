<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 22-05-2015
 * Time: 14:03
 */
include_once(__DIR__.'/../sec/encrypt-decrypt.php');

if(isset($_REQUEST['usr_id']) && is_numeric($_REQUEST['usr_id']) && (isset($_REQUEST['k']) && $_REQUEST['k']=='passwordchange')){
    $usr_id = $_REQUEST['usr_id'];
    $cp = $_REQUEST['cp'];
    $np = $_REQUEST['np'];
    $isValidUser = false;

    $sql = "SELECT * FROM users WHERE id = $usr_id";
    $stmt = $pdo->query($sql);

    if($stmt->rowCount()==1){
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        $salt = $record['salt'];
        $db_pwd = $record['pwd'];

        $cur_pwd = encrypt_decrypt('decrypt',$db_pwd,$salt);

        if($cur_pwd == $cp) $isValidUser = true;
        else $isValidUser = false;

    }else{
        $isValidUser = false;
    }


    if($isValidUser){
        $salt =  substr(strrev(uniqid()),0,5);
        $np_encrypted = encrypt_decrypt('encrypt',$np,$salt);

        $sql = "UPDATE users SET pwd='$np_encrypted', salt='$salt' WHERE id=$usr_id";

        if($pdo->exec($sql)){
            echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'Salasana on vaihdettu onnistuneesti')));
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00CF','resp_msg'=>'Salasanan muuttaminen epäonnistui')));
        }

    }else{
        echo json_encode(array('response'=>array('code'=>'0x00IC','resp_msg'=>'Kuten kohti kirjaa nykyinen salasana ei kelpaa. Anna oikea salasana')));
    }
}else{
    echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Virheellinen puhelu')));
}


