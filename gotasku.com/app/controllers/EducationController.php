<?php

class EducationController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    //Education
    public function getEducationTypesAction(){
        $params = array(
            'a'=>'db-get',
            'sa'=>'education-types'
        );
        echo APICall::execute($params);
    }
    public function getEmpEducationDetailsAction(){
        $params = array(
            'a'=>'db-get',
            'sa'=>'emp-education-det',
            'usr_id'=>$this->session->user_data->usr_id
        );
        $out =  APICall::execute($params);
        $json_out = json_decode($out);
        $records = $json_out->response->records;

        $this_response = '';
        if($json_out->response->count > 0){
            foreach($records as $record){
                $this_response .= '<tr>';
                $this_response .= '<td>'.$record->type_nm.'</td>';
                $this_response .= '<td>'.$record->subject.'</td>';
                $this_response .= '<td>'.$record->experties.'</td>';
                $this_response .= '<td>
                                        <!--a href="javascript:void(0);" class="edit-education" rid="'.$record->id.'"><i class="fa fa-pencil"></i></a> &nbsp; | &nbsp; -->
                                        <a href="javascript:delEdu('.$record->id.');" class="delete-education" rid="'.$record->id.'"><i class="fa fa-trash red"></i></a>
                                    </td>';
                $this_response .= '</tr>';
            }
        }else{
            $this_response = '<tr>';
            $this_response .= '<td colspan="4">No Education details...</td>';
            $this_response .= '</tr>';
        }

        echo $this_response;
    }
    public function saveEmpEducationDataAction(){
        if($this->request->isAjax() && $this->request->isPost()){
            $params = array(
                'a'=>'db-update',
                'sa'=>'update-emp-education',
                'usr_id'=>$this->session->user_data->usr_id,
                'edu_type_id'=>$this->request->get('edu_type'),
                'stream'=>$this->request->get('stream'),
                'subjects'=>$this->request->get('subjects')
            );
            $out = APICall::execute($params);
            echo $out; exit;
            $json_data = json_decode($out);
            if($json_data->response->code='0x0000'){
                echo json_encode(array('response'=>array('code'=>'0x0000','resp_msg'=>'')));
            }else{
                echo json_encode(array('response'=>array('code'=>'0x000E','resp_msg'=>'Education Details could not be stored')));
            }
        }
    }
    public function deleteEmpEducationAction(){
        if($this->request->isAjax() && $this->request->isPost()) {
            $params = array(
                'a'=>'db-delete',
                'sa'=>'del-emp-education',
                'rid'=>$this->request->get('rid'),
                'usr_id' => $this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }

    //Skills
    public function getEmpSkillsAction(){
        $params = array(
            'a'=>'db-get',
            'sa'=>'get-emp-skills',
            'usr_id'=>$this->session->user_data->usr_id
        );
        echo APICall::execute($params);
    }

    public function empSaveSkillsAction(){
        $params = array(
            'a'=>'db-update',
            'sa'=>'save-emp-skills',
            'skills'=>$this->request->get('skills'),
            'usr_id'=>$this->session->user_data->usr_id
        );
        echo APICall::execute($params);
    }

    public function delEmpSkillAction(){
        $params = array(
            'a'=>'db-delete',
            'sa'=>'del-emp-skill',
            'rid'=>$this->request->get('rid'),
            'usr_id'=>$this->session->user_data->usr_id
        );
        echo APICall::execute($params);
    }
}

