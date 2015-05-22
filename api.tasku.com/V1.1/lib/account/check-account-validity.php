<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 21-05-2015
 * Time: 17:31
 */

if(isset($_REQUEST['k']) && $_REQUEST['k']=='Qwus83D#skT!'){
    $email = $_REQUEST['e'];
    $sql = "SELECT id FROM users WHERE usr_nm='$email'";

    $stmt = $pdo->query($sql);

    if($stmt->rowCount() == 1)
        echo json_encode(array('response'=>array('code'=>'0x0000')));
    else
        echo json_encode(array('response'=>array('code'=>'0x00ER2')));
}else{
    echo json_encode(array('response'=>array('code'=>'0x00ER1')));
}