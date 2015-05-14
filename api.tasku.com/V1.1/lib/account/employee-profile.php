<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 30-04-2015
 * Time: 01:27
 */
if(isset($_REQUEST['usr_id'])) {
    $uid = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM users u INNER JOIN worker_details wd ON wd.usr_id = u.id WHERE u.id = $uid";
    $stmt = $pdo->query($sql);
    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','current_user_data'=>$row)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00FE','resp_msg'=>'Error in fetching details...')));
    }
}