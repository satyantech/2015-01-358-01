<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 13-03-2015
 * Time: 12:11
 */
if(isset($_REQUEST['sa'])){
    switch ($_REQUEST['sa']){
        case 'fcr':
            $res =  getCountries();
            echo $res;
            break;
        case 'grd':
            $cid = 0;
            if(isset($_REQUEST['id'])){$cid=$_REQUEST['id'];}
            $res = getStates($cid);
            echo $res;
            break;
        default:
            echo 'GD:0x001';
            break;
    }
}else{
    echo 1;
}

function getStates($cid){
    $sql = "SELECT  id, stt_nm 'name',isDefault FROM `countries`";
    $countries = array();
    $res = mysql_query($sql);
    if($res){
        if($_REQUEST['cnt']=='ddl'){
            $output = '<option value="0">--Select--</option>';
            while($r = mysql_fetch_object($res)){
                $output .= '<option value="'.$r->id.'">'.$r->name.'</option>';;
            }
            return $output;
        }else{
            return 'CD:0x002';
        }
    }else{
        return 'CD:0x001';
    }
}
function getCountries(){
    $sql = "SELECT  id, country_nm 'name',isDefault FROM `countries`";
    $countries = array();
    $res = mysql_query($sql);
    if($res){
        if($_REQUEST['cnt']=='ddl'){
            $output = '<option value="0">--Select--</option>';
            while($r = mysql_fetch_object($res)){
                $output .= '<option value="'.$r->id.'">'.$r->name.'</option>';;
            }
            return $output;
        }else{
            return 'CD:0x002';
        }
    }else{
        return 'CD:0x001';
    }
}

/**
 *  Error Prefixes:
 *      CD : Errors related to Country Data
 *      GD : Geo data Parameters
 * ----------------------------<ABBRIVIATIONS>------------------------------
 *  sa          :  Sub Action
 *                  fcr     :   Fetch Country Records
 *  cnt             :  Container
 *  ddl             :  Drop Down List
 *
 */
?>