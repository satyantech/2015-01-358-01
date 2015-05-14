<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 14-04-2015
 * Time: 12:19
 */
?>
<?php require_once('config/config.php'); ?>
<?php
$search = isset($_REQUEST['s'])?($_REQUEST['s']!='')?' WHERE skill_tag LIKE \'%'.$_REQUEST['s'].'%\'':'':'';
$sql = "SELECT id,skill_tag value FROM skill_tags $search LIMIT 10";
$stmt = $pdo->query($sql);
//print_r($pdo->errorInfo());exit;
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($data)
    echo json_encode($data);
else
    echo '';
?>