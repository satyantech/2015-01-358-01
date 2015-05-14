<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 01-05-2015
 * Time: 10:52
 */
$sql    = "SELECT id,type_nm val FROM education_types";
$stmt   =  $pdo->query($sql);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array('educations'=>$records));
?>