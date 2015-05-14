<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 23-04-2015
 * Time: 01:15
 */

$tables = $_REQUEST['ts'];
$tables_list = explode(',',$tables);
$pdo->exec('SET foreign_key_checks = 0');
foreach($tables_list as $table) {
    /*if ($pdo->exec('TRUNCATE ' . $table)) {
        echo json_encode(array('response' => array('code' => '0x0000', 'resp_msg' => 'Trucating of following tabl   es Done:' . $tables))).'<br/>';
    } else {
        echo json_encode(array('response' => array('code' => '0xFFFF', 'resp_msg' => json_encode($pdo->errorInfo())))).'<br/>';
    }*/
    echo $pdo->exec('TRUNCATE ' . $table).' -|- '.$table.'<br/>';
}
$pdo->exec('SET foreign_key_checks = 1');
