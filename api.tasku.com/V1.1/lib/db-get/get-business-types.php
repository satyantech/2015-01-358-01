<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 02-05-2015
 * Time: 15:57
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']) {
    $sql = "select * from business_types order by type_nm";
    $records = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'','records'=>$records)));
}