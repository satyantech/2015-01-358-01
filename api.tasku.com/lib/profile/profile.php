<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 17-03-2015
 * Time: 15:46
 */
if((!isset($_REQUEST['eme_id']) && !isset($_REQUEST['emr_id']))){echo 1; exit;} // if requested without a parameter
if(isset($_REQUEST['eme_id'])) {
    //Getting worker Details
    $sql = "SELECT * FROM worker_details wd where usr_id = ".$_REQUEST['eme_id'];
    $stmt = $pdo->query($sql);
    if($stmt->rowCount() <> 1) {echo 1; exit;}
    $values = $stmt->fetch(PDO::FETCH_ASSOC);
    $valarr = array();
    foreach($values as $k => $v){
        $valarr[$k] = $v;
    }

    //getting education details of the worker
    $sql_edu = 'SELECT * FROM worker_education_details WHERE usr_id='.$_REQUEST['eme_id'];
    $stmt_edu = $pdo->query($sql_edu);

    if($stmt_edu->rowCount()>0){
        $row = $stmt_edu->fetch();
        $valarr['education'] = $row;
    }else{
        $valarr['education'] = null;
    }

    echo '{"eme_data":'.json_encode($valarr).'}';
}

if(isset($_REQUEST['emr_id'])) {
    //Getting worker Details
    $sql = "SELECT * FROM employer_details where usr_id = ".$_REQUEST['emr_id'];
    $stmt = $pdo->query($sql);
    if($stmt->rowCount() <> 1) {echo 1; exit;}
    $values = $stmt->fetch(PDO::FETCH_ASSOC);
    $valarr = array();
    foreach($values as $k => $v){
        $valarr[$k] = $v;
    }



    echo '{"eme_data":'.json_encode($valarr).'}';
}

?>