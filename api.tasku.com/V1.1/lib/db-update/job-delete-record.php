<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 18-05-2015
 * Time: 13:05
 */

if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
        $dt = $_REQUEST['dt']; // 1:deactivate, 0:delete
        $usr_id = $_REQUEST['usr_id'];
        $rid = $_REQUEST['rid'];
        $sql = "UPDATE jobs SET ";
        if($dt==1){
               $sql .= 'is_active=0';
        }
        elseif($dt==0){
               $sql .= 'is_deleted=1';
        }
        $sql .= ' WHERE id='.$rid.' AND emplyr_id='.$usr_id;
        try {
            if ($pdo->exec($sql)) {
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
            } else {
                echo json_encode(array('response'=>array('code'=>'0x00ER','resp_msg'=>'Job Record could not be updated')));
            }
        }catch(Exception $ex){
            echo json_encode(array('response'=>array('code'=>'0x00EX','resp_msg'=>'Driver Exception while deleting job')));
        }
}