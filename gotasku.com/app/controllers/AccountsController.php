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
}

