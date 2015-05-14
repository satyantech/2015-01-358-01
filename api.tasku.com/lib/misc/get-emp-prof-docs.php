<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 25-03-2015
 * Time: 22:21
 */

if(!isset($_REQUEST['sa'])) {echo 'No Parameters set';exit;}
if(trim($_REQUEST['sa'])=='' || trim($_REQUEST['usr_id'])=='') {echo 'No Value Provided for one or more of the Parameters';exit;}

if(trim($_REQUEST['sa'])=='FPDOCEMP'){ //Fetch Profile Documents for Employee
    $usr_id = $_REQUEST['usr_id'];
    $sql = "SELECT * FROM worker_docs WHERE usr_id=$usr_id";
    $stmt = $pdo->query($sql);
    $results = array();
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
        $results['docs'][]=$row;
    }
    echo json_encode($results);
}