<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 22-04-2015
 * Time: 17:31
 */
include_once(__DIR__.'/../sec/encrypt-decrypt.php');

//USER TYPES
define('SUPER_ADMIN',1);
define('EMPLOYEE',2);
define('EMPLOYER',3);

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='auth'){
    $unm = $_REQUEST['unm'];
    $usr_pwd = $_REQUEST['pwd'];
    $sql = "SELECT * FROM users WHERE usr_nm='$unm'";
    $stmt = $pdo->query($sql);
    if($stmt->rowCount() == 1){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['stts']==1) {
            $usr_id = $row['id'];
            $epwd = $row['pwd'];
            $salt = $row['salt'];
            $dpwd = encrypt_decrypt('decrypt', $epwd, $salt);
            $stmt = null;
            $row2 = null;
            if ($dpwd == $usr_pwd) {
                if($row['usr_type_id']==EMPLOYEE){
                    $sql = "SELECT * FROM users u INNER JOIN worker_details wd ON wd.usr_id = u.id WHERE usr_id=$usr_id";
                }elseif($row['usr_type_id']==EMPLOYER){
                    $sql = "SELECT * FROM users u INNER JOIN employer_details ed ON ed.usr_id = u.id WHERE usr_id=$usr_id";
                }
                $stmt = $pdo->query($sql);
                $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode(array('response' => array('code' => '0x0000', 'resp_msg' => 'Please Wait while you are logged in...!','user_data'=>$row2)));
            } else {
                echo json_encode(array('response' => array('code' => '0x00062', 'resp_msg' => 'Please check credentials you have entered...')));
            }
        }else{
            echo json_encode(array('response' => array('code' => '0x00063', 'resp_msg' => 'Your Account is inactive please contact  admin')));
        }
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00061','resp_msg'=>'Invalid credentials...')));
    }


}