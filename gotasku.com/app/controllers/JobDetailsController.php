<?php

class JobDetailsController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        if(!isset($this->session->user_data)){
            if($this->router->getControllerName()!='index' || $this->router->getControllerName()!=''){
                $this->response->redirect('http://'.$_SERVER['HTTP_HOST'].$this->url->getStaticBaseUri().'login');
            }
        }else {
            if($this->session->user_data->usr_type_id != EMPLOYEE){
                $this->response->redirect('profile/');
            }else {
                $this->view->setLayout('inner-template');
            }
        }
    }
    public function indexAction()
    {

    }
    public function showJobAction(){

    }
    public function searchJobAction(){

    }
}

