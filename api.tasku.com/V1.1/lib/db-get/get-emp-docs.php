<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 02-05-2015
 * Time: 00:29
 */
if(isset($_REQUEST['usr_id']) && $_REQUEST['usr_id']){
    $usr_id  = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM worker_docs WHERE usr_id = $user_id";
    $stmt = $pdo->query($sql);
    $arr_res = $stmt->fetchAll($PDO::FETCH_ASSOC);

}