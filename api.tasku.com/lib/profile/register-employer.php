<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 27-03-2015
 * Time: 14:52
 */
include __DIR__.'../../encrypt-decrypt.php';
//These bellow constants need to be changes in future
define('USER_TYPE',3);
define('ORG_ID',1);

if(!isset($_REQUEST['fn']) || $_REQUEST['fn']=='') {echo 'EPD:0x001A';exit;}
if(!isset($_REQUEST['ln']) || $_REQUEST['ln']=='') {echo 'EPD:0x001B';exit;}
if(!isset($_REQUEST['em']) || $_REQUEST['em']=='') {echo 'EPD:0x001C';exit;}
if(!isset($_REQUEST['pw']) || $_REQUEST['pw']=='') {echo 'EPD:0x001D';exit;}

$first_name     =   $_REQUEST['fn'];
$last_name      =   $_REQUEST['ln'];
$user_name      =   $email      =   $_REQUEST['em'];
$password       =   $_REQUEST['pw'];

$user_id = 0;

$salt = substr(strrev(uniqid()),0,5);
$pwd_encrypted = encrypt_decrypt('encrypt',$password,$salt);

$attempt = 1;

while(!$user_id){

    $pdo->beginTransaction();
    $attempt++;
    //Create the user record
    $sql = "INSERT INTO users(org_id,usr_type_id,prnt_usr_id,usr_nm,pwd,salt,stts) VALUES(".ORG_ID.",".USER_TYPE.",0,'$user_name','$pwd_encrypted','$salt',1)";

    $pdo->exec($sql);

    $user_id = $pdo->lastInsertId();
    //if the user id is not generated
    if(!$user_id) {
        $pdo->rollBack();
        //if we have attempted 3 times to insert the record and failed
        if ($attempt==3) die('Max Attempts Done to create the Account');
        else continue;
    }else{
        //Enter in the Employee/Worker Table
        $sql = "INSERT INTO employer_details(usr_id,cntct_prsn,email1) VALUES($user_id,'$first_name $last_name','$email')";
        $pdo->exec($sql);

        $ud_insert_id = $pdo->lastInsertId();

        if(!$ud_insert_id) {
            $pdo->rollBack();
            echo $sql; // Error in employer Details record creation
        }
        else {
            $pdo->commit();
            //Send Notifications here Mail/Text
            echo 0;
        }
    }
}

?>