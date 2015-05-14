<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function initialize()
    {
        $this->view->setLayout('login-layout');
        if($this->session->get('user_data')){
            $this->response->redirect('profile');
        }
    }
    public function indexAction()
    {

    }
    public function registerUserAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'     =>  'account',
                'sa'    =>  'fereg',
                'oi'    =>  ORG_ID, //declared in Constants page
                'at'    =>  $this->request->get('atype'),
                'fn'    =>  $this->request->get('fnm'),
                'ln'    =>  $this->request->get('lnm'),
                'mn'    =>  $this->request->get('mobile'),
                'em'    =>  $this->request->get('email'),
                'pd'    =>  $this->request->get('pwd')
            );
            echo APICall::execute($params);
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00A9','resp_msg'=>'Invalid call.')));
        }
    }
    public function authenticateAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'      =>  'account',
                'sa'     =>  'auth',
                'unm'    =>  $this->request->get('u'),
                'pwd'    =>  $this->request->get('p')
            );
            $out = APICall::execute($params);
            $JSON_res = json_decode($out);
            if($JSON_res->response->code=='0x0000'){
                $this->session->set('user_data',$JSON_res->response->user_data);
                echo $out;
            }else{
                echo json_encode(array('response'=>array('code'=>'0x00AE','resp_msg'=>'Please check your credentials.')));
        }
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00A9','resp_msg'=>'Invalid call.')));
        }
    }
}

