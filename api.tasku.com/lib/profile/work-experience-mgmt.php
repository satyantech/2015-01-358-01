<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 21-03-2015
 * Time: 15:46
 */

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='ins_data'){
    $user_id    = $_REQUEST['usr_id'];
    $segment    = $_REQUEST['segment'];
    $role       = $_REQUEST['role'];
    $employer   = $_REQUEST['org'];
    $from       = $_REQUEST['from'];
    $to         = $_REQUEST['to'];
    $skills     = $_REQUEST['skills'];
    $sql = "
        INSERT INTO worker_experiences
        VALUES(null,$user_id,'$role','$employer','$from','$to','$skills');
    ";
    $rec = $pdo->exec($sql);
    $data = array();
    if($rec){
        $data['response']['out'] = 'Success';
    }else{
        $data['response']['out'] = 'Record could not be saved at this point of time. Please contact Web-admin for help.';
    }
    echo json_encode($data);
}

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='fwe'){
    $user_id    = $_REQUEST['usr_id'];
    $sql = "SELECT id,dsgntn role,org_nm org,`from` 'start',`to` 'end',skills FROM worker_experiences WHERE usr_id=$user_id ORDER BY `from` DESC";
    $stmt = $pdo->query($sql);
    $data = array();

    if($stmt!= null) $data['response']['out'] = 'Success';
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
        $data['response']['data'][] = $row;
    }

    if(!$data) {
        $data['response']['out']='No Records!';
        $data['response']['data']='No Records!';
    }

    echo json_encode($data);

}

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='dex'){

    $usr_id = $_REQUEST['usr_id'];
    $rec_id = $_REQUEST['rid'];

    $sql = "DELETE FROM worker_experiences WHERE id = $rec_id AND usr_id = $usr_id";
    $rows_count = $pdo->exec($sql);

    $data = array('response'=>array('out'=>''));

    if($rows_count>0){
        $data['response']['out']='Success';
    }else{
        $data['response']['out']='No Record(s) Deleted!';
    }
    echo json_encode($data);
}