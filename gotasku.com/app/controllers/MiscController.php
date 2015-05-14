<?php

class MiscController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function getBusinessTypesAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->request->isPost()){
            $params = array(
                'a'         =>  'db-get',
                'sa'        =>  'get-business-types',
                'usr_id'    =>  $this->session->user_data->usr_id
            );
           echo APICall::execute($params);
        }
    }
    public function getJobTypesAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->request->isPost()){
            $params = array(
                'a'         =>  'db-get',
                'sa'        =>  'get-job-types',
                'usr_id'    =>  $this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }
}

