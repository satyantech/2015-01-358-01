<?php

class AccountsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function resetPasswordAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'=>'account',
                'sa'=>'reset-account-password',
                'e'=>$this->request->get('a'),
                'k'=>'Ax84fg!@dgQ'
            );
            $out =  APICall::execute($params);
            $json_data =  json_decode($out);
            if($json_data->response->code=='0x0000'){
                //send email
                $to     =   $this->request->get('a');
                $pwd    =   $json_data->response->pwd;
                $body = '
                    <strong>Hi,</strong><br/>
                    <p>
                        <h3>Kuten kohti pyydät, tilin salasana on vaihdettu. Huomaa karjua mainittuja yksityiskohtia kirjaudu tilillesi.</h3>
                        <br/>
                        <table>
                            <tr>
                                <td width="150">User Name</td>
                                <td width="400"> : '.$to.'</td>
                            </tr>
                            <tr>
                                <td width="150">Password</td>
                                <td width="400"> : '.$pwd.'</td>
                            </tr>
                        </table>
                    </p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    Ystävällisin terveisin,<br/>
                    <strong>joukkue Gotasku</strong>
                    <hr/>
                    <img src="http://54.93.65.209/gotasku.com/img/task-logo.png" style="width:84px; height:32px; margin-top:-10px;"> | <a href="http://www.gotasku.com" target="_blank">www.gotasku.com</a>
                    ';
                $isMailSent = TaskuMailSender::sendMail($to,"Gotasku Tilin salasanan palauttaminen",$body);
                if($isMailSent=="Success"){
                    echo json_encode(array('response'=>array('code'=>'0x0000')));
                }else{
                    echo json_encode(array('response'=>array('code'=>'0x00ER')));
                }
            }else{
                echo $out;
            }
        }
    }
    public function isValidAccountIdAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'=>'account',
                'sa'=>'check-account-validity',
                'e'=>$this->request->get('a'),
                'k'=>'Qwus83D#skT!'
            );
            echo APICall::execute($params);
        }
        //echo json_encode(array('response'=>array('code'=>'0x0000')));
    }
    public function changePasswordAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && isset($this->session->user_data)){
            $usr_id  = $this->session->user_data->usr_id;
            $ep = $this->request->get('c'); //existing password
            $np = $this->request->get('n'); //new password
            $cp = $this->request->get('m'); //confirm password

            if(strlen($ep)==0){echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Kirjoita Nykyinen salasana')));exit;}
            if(strlen($np)==0){echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Kirjoita uusi salasana')));exit;}
            if(strlen($cp)==0){echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Kirjoita Vahvista salasana')));exit;}
            if($np!=$cp){echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Uusi salasana ja vahvista salasana eivät ole samat')));exit;}
            if($ep==$np){echo json_encode(array('response'=>array('code'=>'0x00BD','resp_msg'=>'Uusi salasana ei voi olla sama kuin nykyinen salasana')));exit;}

            $params = array(
                'a'         =>  'db-update',
                'sa'        =>  'change_user_password',
                'usr_id'    =>  $usr_id,
                'cp'        =>  $ep,
                'np'        =>  $np,
                'k'         =>  'passwordchange'
            );

            echo APICall::execute($params);
        }
    }
}

