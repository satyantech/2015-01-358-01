<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 20-03-2015
 * Time: 11:20
 */
if(isset($_REQUEST['sa']) && $_REQUEST['sa']=="eduTypes"){
    $out = array('response'=>array('message','No Code Executed'));
    $sql = "SELECT id,type_nm as 'type_name' FROM education_types";
    $stmt = $pdo->query($sql);
    if($stmt){
        $out['response']['out'] = 'Success';
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $out['response']['data'][] = $row;
        }
    }else{
        $out['response']['out'] = 'Not able to fetch the Education Types';
    }
    echo json_encode($out);
}