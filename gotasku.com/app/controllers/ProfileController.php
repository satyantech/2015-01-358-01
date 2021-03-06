<?php

class ProfileController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
        //$this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if(!isset($this->session->user_data)){
            if($this->router->getControllerName()!='index' || $this->router->getControllerName()!=''){
                $this->response->redirect('http://'.$_SERVER['HTTP_HOST'].$this->url->getStaticBaseUri().'login');
            }
        }else {
            $this->view->setLayout('inner-template');
        }
    }
    public function indexAction(){
        $params = array('a'=>'account');
        if($this->session->user_data->usr_type_id == EMPLOYER) {
            $params['sa'] = 'employer-profile';
            $params['usr_id'] = $this->session->user_data->usr_id;
            
            $fetched_usr_data = json_decode(APICall::execute($params));

            if ($fetched_usr_data->response->code == '0x0000'){
                $this->view->setVar('current_user_data',$fetched_usr_data->response->current_user_data);
            }else{
                $this->view->setVar('current_user_data',$this->session->user_data);
            }
            $this->view->setVar('page','profile/employer/employer-profile');
        }
        if($this->session->user_data->usr_type_id == EMPLOYEE){
            $params['sa'] = 'employee-profile';
            $params['usr_id'] = $this->session->user_data->usr_id;
            
//            $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
            $fetched_usr_data = json_decode(APICall::execute($params));
            if ($fetched_usr_data->response->code == '0x0000'){
                $this->view->setVar('current_user_data',$fetched_usr_data->response->current_user_data);
            }else{
                $this->view->setVar('current_user_data',$this->session->user_data);
            }
            $this->view->setVar('page','profile/employee/employee-profile');
        }
    }
    public function viewApplicantProfileAction(){
    	 $params = array('a'=>'account');
    	$params['sa'] = 'employee-profile';
    	$params['usr_id'] = $this->request->get('w');
    	$params['job_id'] = $this->request->get('j');
    	$applicant_data = json_decode(APICall::execute($params));
    	//print_r($applicant_data);
    	if ($applicant_data->response->code == '0x0000'){
    		$this->view->setVar('record',$applicant_data->response->applicant_data);
    	}else{
    		$this->view->setVar('applicant_data',$this->request->get('w'));
    	}
    	 
    	$this->view->page = 'profile/employer/job-applicant';
    }
   /*  public function employeeAction(){
    	$params = array('a'=>'account');
    	 $params['sa'] = 'employee-profile';
    	$params['usr_id'] = $_REQUEST['p'];
    	
    	$fetched_usr_data = json_decode(APICall::execute($params));
    	if ($fetched_usr_data->response->code == '0x0000'){
    		$this->view->setVar('current_user_data',$fetched_usr_data->response->current_user_data);
    	}else{
    		$this->view->setVar('current_user_data',$this->session->user_data);
    	}
    	$this->view->setVar('page','profile/employee/employee-view');
    } */
    public function preferencesAction(){
        if($this->session->user_data->usr_type_id == EMPLOYEE){
//            $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
            $params = array(
                'a'=>'db-get',
                'sa'=>'get-emp-pref',
                'usr_id'=>$this->session->user_data->usr_id
            );
            $out = APICall::execute($params);
            $this->view->setVar('getVals',$out);
            $this->view->setVar('page','profile/employee/employee-preferences');
        }else{
            $this->response->redirect('profile/');
        }
    }
    public function opportunitiesAction(){
        if($this->session->user_data->usr_type_id == EMPLOYEE) {
            $params = array(
                'a' => 'db-get',
                'sa' => 'get-employee-matched-jobs',
                'usr_id' => $this->session->user_data->usr_id
            );
            echo $out = APICall::execute($params);
            $json_out = json_decode($out);
            if (isset($json_out->response->records)) {
                $this->view->setVar('records', $json_out->response->records);
            } else {
                $this->view->setVar('records', 'No Records...');
            }
            $this->view->setVar('page', 'profile/employee/list-opportunities');
        }else{
            $this->response->redirect('profile/');
        }
    }
    public function getEmpDocuments(){

        if($this->request->isAjax() && $this->request->isPost() && $this->session->user_data->usr_type_id == EMPLOYEE){
            $params = array(
                'a' =>'db-get',
                'sa'=>'get-emp-docs',
                'usr_id'=>$this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }
    public function updateEmpPersonalDetailsAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->request->isPost() && $this->session->user_data->usr_type_id == EMPLOYEE){
            $params = array(
                'a'         =>  'db-update',
                'sa'        =>  'update-emp-details',
                'usr_id'    =>  $this->session->user_data->usr_id,
                'field'     =>  $this->request->get('field'),
                'val'       =>  $this->request->get('val')
            );
            echo APICall::execute($params);
        }
    }
    public function updateEmpPreferenceAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->request->isPost() && $this->session->user_data->usr_type_id == EMPLOYEE){
            $params = array(
                'a'         =>  'db-update',
                'sa'        =>  'update-emp-pref',
                'usr_id'    =>  $this->session->user_data->usr_id,
                'field'     =>  $this->request->get('field'),
                'val'       =>  $this->request->get('val')
            );
            echo APICall::execute($params);
        }
    }
    public function updateEmployerAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->session->user_data->usr_type_id == EMPLOYER){
            $params = array(
                'a'     =>  'db-update',
                'sa'    =>  'update-employer',
                'field' =>  $this->request->get('f'),
                'val'   =>  $this->request->get('v'),
                'usr_id'=>  $this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }
    public function updateEmployerBillingDetailsAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->session->user_data->usr_type_id == EMPLOYER){
            if($this->request->get('be')){
                $params = array(
                    'a' => 'db-update',
                    'sa' => 'update-employer-billing',
                    'be'=>1,
                    'v' => $this->request->get('v'),
                    'usr_id' => $this->session->user_data->usr_id
                );
            }else {
                $params = array(
                    'a' => 'db-update',
                    'sa' => 'update-employer-billing',
                    'fields' => 'o,a,p,e,s',
                    'vals' => $this->request->get('o') . ',' . $this->request->get('a') . ',' . $this->request->get('p') . ',' . $this->request->get('e') . ',' . $this->request->get('s'),
                    'usr_id' => $this->session->user_data->usr_id
                );
            }
            echo APICall::execute($params);
        }
    }
    public function applyForJobAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax() && $this->session->user_data->usr_type_id == EMPLOYEE){
            $params = array(
                'a'=>'db-update',
                'sa'=>'job-application',
                'usr_id'=>$this->session->user_data->usr_id,
                'rid'=>$this->request->get('rid')
            );
            echo APICall::execute($params);
        }
    }
    public function settingsAction(){
        if($this->session->user_data->usr_type_id == EMPLOYEE) {
            $this->view->page = 'profile/employee/settings';
        }else if($this->session->user_data->usr_type_id == EMPLOYER){
            $this->view->page = 'profile/employee/settings';
        }
    }

	//******************************Document Upload**********************//
	
    public function uploadempdocumentsAction()
    {
    	$this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
    	if($this->request->isAjax()){
    		$dtid=$this->request->get('dtid');
    	}
    	if($this->request->hasFiles()) {
    		try {
    			$file = $this->request->getUploadedFiles()[0];
    
    			$path = __DIR__.'/../../public/files/profile_docs/';
    			$file_name = $file->getName();
    			$str_base_64 = '';
    			if($this->request->get('returnBase64')) {
    				$str_base_64 = base64_encode(file_get_contents($file->getTempName()));
    			}
    			if($file->moveTo($path.$file->getName())){
    
    				$params = array(
    						'a'      =>  'account',
    						'sa'     =>  'employee-documents',
    						'uid'    =>  $this->session->user_data->usr_id,
    						'file'    =>  $file_name,
    						'dtid'    => $dtid
    				);
    				$res = APICall::execute($params); //	print_r($res); die;
    
    				$out = json_decode($res);
    
    				if($out->response->code=='0x0000'){
    					$id=$out->response->id;
    					echo json_encode(array('response' => array('out' => 'Success','id'=>$id,'file'=>$file_name, 'resp_msg' => 'Successfully Uploaded..')));
    
    				}else{
    					@unlink($path.$file_name);
    					echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Updation Failed...')));
    				}
    					
    			}
    			else{
    				echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Uploading Failed...')));
    			}
    		}
    		catch (Exception $e) {
    			echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Exception'.$e->getMessage())));
    		}
    	}
    }


    //************** Notification Functions Start ****************/
    public function getNewJobsAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->isAjax()){
            $params = array(
                'a'=>'db-get',
                'sa'=>'notifications-job',
                'usr_id'=>$this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }
    public function getJobDetailsAction(){
        $job_record = null;
        $job_id = $this->request->get('j');
        $params = array(
            'a'=>'db-get',
            'sa'=>'get-job-details',
            'usr_id'=>$this->session->user_data->usr_id,
            'job_id'=>$job_id
        );
        $out  = APICall::execute($params);
        $json_out = json_decode($out);
        if($json_out->response->code=='0x0000'){
            $job_record = $json_out->response->record;
        }
        $this->view->job_record = $job_record;
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
    }
    public function getApplicationsAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        $params = array(
            'a'=>'db-get',
            'sa'=>'notification-jobapplications',
            'usr_id'=>$this->session->user_data->usr_id
        );
        echo APICall::execute($params);
    }
    //************** Notification Functions End ****************/
}

