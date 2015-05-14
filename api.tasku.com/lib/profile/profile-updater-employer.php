<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 17-03-2015
 * Time: 15:46
 */
$db_convention = array(
    'bd'=>array(
        'bname'         =>  'bsnss_nm',
        'b_nature'      =>  'business_type',
        'b_addr'        =>  'cntct_addr',
        'b_postl_cd'    =>  'pstl_cd',
        'b_phone'       =>  'cntct_num1',
        'b_website'     =>  'web_site'
    ),
    'cd'=>array(
        'cnt_fnm'       =>  'cntct_prsn_fnm',
        'cnt_lnm'       =>  'cntct_prsn_lnm',
        'cnt_role'      =>  'role',
        'cnt_phone'     =>  'cntct_num2',
        'cnt_email'     =>  'email2',
        'desc'          =>  'comp_desc'
    ),
    'bld'=>array(
        'biller'        =>  'billing_name',
        'b_addr2'       =>  'billing_addr',
        'b_pcode'       =>  'billing_pstl_cd'
    ),
    'xt'=>array(
        'bill_email'    =>  'bill_by_email'
    )
);

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='upd_empr'){
        $segment    = $_REQUEST['segment'];
        $field      = $_REQUEST['field'];
        $value      = $_REQUEST['value'];
        $value      = $pdo->quote($value);
        $usr_id     = $_REQUEST['usr_id'];
        $sql = 'UPDATE employer_details SET '.$db_convention[$segment][$field].'='.$value.'  WHERE usr_id='.$usr_id ;
        $ef_rec = $pdo->exec($sql);
        if($ef_rec){
            if($ef_rec>0){
                echo json_encode(array(
                    'response'=>array(
                        'out'   =>'Success',
                        'error' =>'0'
                    )
                ));
            }else{
                echo json_encode(array(
                    'response'=>array(
                        'out'   =>'No Records Updated',
                        'error' =>'ERRU:0x0002'
                    )
                ));
            }
        }else{
            echo json_encode(array(
                'response'=>array(
                    'out'   =>'Updation Failed',
                    'error' =>array('ERRU:0x0001')
                )
            ));
        }
}

if(isset($_REQUEST['sa']) && $_REQUEST['sa']=='uplogo'){
    $usr_id         = $_REQUEST['uid'];
    $pic            = $_REQUEST['pic'];

    $sql = "UPDATE employer_details SET org_logo='$pic' WHERE usr_id=$usr_id";
    $rec = $pdo->exec($sql);
    if($rec){
        if($ef_rec>0){
            echo json_encode(array(
                'response'=>array(
                    'out'   =>'Success',
                    'error' =>'0'
                )
            ));
        }else{
            echo json_encode(array(
                'response'=>array(
                    'out'   =>'No Records Updated',
                    'error' =>'ERRU:0x0002 | '.$sql
                )
            ));
        }
    }else{
        echo json_encode(array(
            'response'=>array(
                'out'   =>'Updation Failed',
                'error' =>'ERRU:0x0001 | '.$sql
            )
        ));
    }
}