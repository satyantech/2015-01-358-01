<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 30-04-2015
 * Time: 01:34
 */
if(isset($_REQUEST['usr_id'])) {
    $uid = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM users u INNER JOIN employer_details ed ON ed.usr_id = u.id WHERE u.id = $uid";
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row){
        echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','current_user_data'=>$row)));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x00FE','resp_msg'=>'Error in fetching details... ||| '.$sql.' ||| '.json_encode($pdo->errorInfo()))));
    }
}