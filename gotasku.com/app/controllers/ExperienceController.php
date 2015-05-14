<?php

class ExperienceController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function getEmpExperiencesAction(){
        if($this->request->isAjax()){
            $params = array(
                'a'=>'db-get',
                'sa'=>'get-emp-experiences',
                'usr_id'=>$this->session->user_data->usr_id
            );
            $out = APICall::execute($params);
            $json_out = json_decode($out);
            $response = '';
            if($json_out->response->code=='0x0000'){

                foreach($json_out->response->records as $r){
                    $response .= '<tr>';
                    $response .= '<td>'.$r->dsgntn.'</td>';
                    $response .= '<td>'.$r->org_nm.'</td>';
                    $response .= '<td>'.$r->from.'</td>';
                    $response .= '<td>'.$r->to.'</td>';
                    $response .= '<td><a href="javascript:empDelExp('.$r->id.')" class="del-exp"><i class="fa fa-trash-o"></i></a></td>';
                    $response .= '</tr>';
                }
            }else{
                $response = '<tr><td colspan="5">No Records Found...</td></tr>';
            }
            echo $response;
        }
    }
    public function delEmpExperienceAction(){
        if($this->request->isAjax()){
            $params = array(
                'a'=>'db-delete',
                'sa'=>'del-emp-experience',
                'rid'=>$this->request->get('rid'),
                'usr_id'=>$this->session->user_data->usr_id
            );
            echo APICall::execute($params);
        }
    }
    public function saveEmpExperienceAction(){
        if($this->request->isAjax() && $this->request->isPost()){
            $params = array(
                'a'=>'db-update',
                'sa'=>'save-emp-experience',
                'usr_id'=>$this->session->user_data->usr_id,
                'desig'=>$this->request->get('desig'),
                'org'=>$this->request->get('org'),
                'from'=>$this->request->get('from'),
                'to'=>$this->request->get('to')
            );
            echo APICall::execute($params);
        }
    }
}

