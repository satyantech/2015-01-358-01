<?php
if(isset($_REQUEST['unm']) && isset($_REQUEST['pwd'])){
    $out = array();
    $stmt = $pdo->query("SELECT id,usr_type_id,pwd,salt from users where usr_nm='".$_REQUEST['unm']."' AND stts=1");

    if($stmt->rowCount() == 0){$out['response']['out'] = 'Invalid Credentials';}
    elseif($stmt->rowCount() > 1) {$out['response']['out']= 'Please Contact App Admin.';}
    else{
        $row = $stmt->fetch();
        include __DIR__."/encrypt-decrypt.php";
        $db_pwd = $row['pwd'];
        $db_salt = $row['salt'];

        if(encrypt_decrypt('decrypt',$db_pwd,$db_salt) == $_REQUEST['pwd']){
            $out['response']['user_id'] = $row['id'];
            $out['response']['usr_type_id'] = $row['usr_type_id'];
            $out['response']['out'] = 'Success';
        }else{
            $out['response']['out'] = 'Käyttö estetty!';
        }

    }
    echo json_encode($out);
}
?>