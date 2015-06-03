<?php
/**
 * Created by PhpStorm.
 * User: Gayathri
 * Date: 19-05-2015
 * Time: 10:31
 */

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='employee-documents'){
     $usr_id         =   $_REQUEST['uid'];
      $doc_type_id         =   $_REQUEST['dtid'];
     $doc_type   =   1;
     $file=$_REQUEST['file'];
     $doc_path="http://".$_SERVER['HTTP_HOST']."/mygotasku/gotasku.com/files/profile_docs/".$file;
  
   
     $pdo->beginTransaction();
   
       $sql = "INSERT INTO worker_docs(usr_id,doc_type_id,doc_path) values(:usr_id,:doc_type_id,:doc_path)";
            $stmt = $pdo->prepare($sql);
           $params = array(':usr_id'=>$usr_id,':doc_type_id'=>$doc_type_id,':doc_path'=>$doc_path);
            $res = $stmt->execute($params); 
            $id = $pdo->lastInsertId();
            if($res)
            {
                $pdo->commit();
   echo json_encode(array('response'=>array('code'=>'0x0000','id'=>$id,'filename'=>$file,'resp_msg'=>'You have been successfully registered. Please proceed to login.')));
            }
            else{
                $pdo->rollBack();
   echo json_encode(array('response'=>array('code'=>'0x00051','resp_msg'=>'Account registration FAILED...')));
            }

}
