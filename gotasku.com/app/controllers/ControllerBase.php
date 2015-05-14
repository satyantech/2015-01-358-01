<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize(){
        if(!isset($this->session->user_data)){
            if($this->router->getControllerName()!='login' || $this->router->getControllerName()!=''){
                $this->response->redirect(SITE_PATH.'login');
            }
        }else{
            $this->response->redirect(SITE_PATH.'profile');
        }
    }
}
