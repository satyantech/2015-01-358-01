<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 22-04-2015
 * Time: 17:21
 */
include_once('config/config.php');
$called_path = '';
if(isset($_REQUEST['a'])){
    $called_path = __DIR__.'/lib/'.$_REQUEST['a'].'/';
    if(isset($_REQUEST['sa'])){
        $called_path .= $_REQUEST['sa'].'.php';
        if(file_exists($called_path)) include_once($called_path);
        else echo json_encode(array('response'=>array('code'=>'0x0003','resp_msg'=>'Invalid parameters sent for processing...')));
    }else{
        echo json_encode(array('response'=>array('code'=>'0x0002','resp_msg'=>'Invalid set of parameters sent for processing...')));
    }
}else{
    echo json_encode(array('response'=>array('code'=>'0x0001','resp_msg'=>'Invalid set of parameters sent for processing...')));
}
?>

