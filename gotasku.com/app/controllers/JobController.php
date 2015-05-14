<?php

class JobController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        if(!isset($this->session->user_data)){
            if($this->router->getControllerName()!='index' || $this->router->getControllerName()!=''){
                $this->response->redirect('http://'.$_SERVER['HTTP_HOST'].$this->url->getStaticBaseUri().'login');
            }
        }else {
            if($this->session->user_data->usr_type_id != EMPLOYER){
                $this->response->redirect('profile/');
            }else {
                $this->view->setLayout('inner-template');
            }
        }
    }
    public function indexAction(){}
    public function postingAction(){$this->view->setVar('page','job/job-posting');}

    public function manageAction(){
        //$this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        $this->view->setVar('page','job/manage-job-postings');
        $out=$this->getPostedJobs();
        $json_out= json_decode($out);
        //echo '<pre>';print_r($json_out);
        $this->view->records = $json_out->response->records;

    }

    public function cretaeJobAction(){ //Creating the Job from job.posting ajax calls only
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'      =>  'db-update',
                'sa'     =>  'post-job',
                'usr_id' =>  $this->session->user_data->usr_id,
                'j'=>$this->request->get('j'),
                'jt'=>$this->request->get('jt'),
                'std'=>$this->request->get('std'),
                'end'=>$this->request->get('end'),
                'eg'=>$this->request->get('eg'),
                'erg'=>$this->request->get('erg'),
                'sc'=>$this->request->get('sc'),
                'bn'=>$this->request->get('bn'),
                'bt'=>$this->request->get('bt'),
                'ba'=>$this->request->get('ba'),
                'bp'=>$this->request->get('bp'),
                'bc'=>$this->request->get('bc'),
                'ws'=>$this->request->get('ws'),
                'br'=>$this->request->get('br'),
                'jd'=>$this->request->get('jd'),
                'mr'=>$this->request->get('mr'),
                'ld'=>$this->request->get('ld')
            );
           echo $out = APICall::execute($params);
        }else{
            echo json_encode(array('response'=>array('code'=>'0x00A9','resp_msg'=>'Invalid call.')));
        }
    }
    public function updateaJobAction(){

    }
    private function getPostedJobs()
    {
        try {
            $params = array(
                'a' => 'db-get',
                'sa' => 'get-posted-jobs',
                'usr_id' => $this->session->user_data->usr_id
            );
            return APICall::execute($params);

        } catch (Exception $e) {
            return json_encode(array('response' => array('code' => '0x00EX', 'resp_msg' => 'Error while retrieving records')));
        }
    }
}

