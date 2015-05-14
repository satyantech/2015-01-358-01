<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 12:13
 */
if(isset($_REQUEST['usr_id'])){
    $usr_id = $_REQUEST['usr_id'];
    $sql = "SELECT wed.id,et.type_nm,wed.subject,wed.experties FROM worker_education_details wed INNER JOIN education_types et ON et.id = wed.edu_type_id WHERE wed.usr_id=$usr_id";
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(array('response'=>array('code'=>'0x0000','records'=>$records,'count'=>$stmt->rowCount())));
}