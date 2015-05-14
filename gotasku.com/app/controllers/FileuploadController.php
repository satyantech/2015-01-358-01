<?php

class FileuploadController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function ProfilePicUploadAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
        if($this->request->hasFiles()) {
            try {
                $file = $this->request->getUploadedFiles()[0];
                if($this->request->get('strictly')) {
                    $types_arr = explode(',', $this->request->types());
                    $isTypeOk = false;
                    foreach ($types_arr as $type) {
                        if ($file->getType() == $type) {
                            $isTypeOk = true;
                            break;
                        }
                    }
                    if (!$isTypeOk) {
                        echo json_encode(array('response' => array('out' => 'error', 'resp_msg' => 'Invalid Format')));
                        exit;
                    }
                }
                $path = __DIR__.'/../../public/img/profiles/';
                $file_name = $file->getName();
                $str_base_64 = '';
                if($this->request->get('returnBase64')) {
                    $str_base_64 = base64_encode(file_get_contents($file->getTempName()));
                }
                if($file->moveTo($path.$file->getName())){
                    $params = array(
                        'a'             =>      'account',
                        'sa'            =>      'profileupdate',
                        'prof_pic'      =>      $file_name,
                        'usr_id'        =>      $this->session->user_data->usr_id,
                        'usr_type_id'   =>      $this->session->user_data->usr_type_id
                    );
                    $res = APICall::execute($params);

                    $out = json_decode($res);

                    if($out->response->code=='0x0000'){
                        $this->session->user_data->profile_pic = $file_name;
                        if($this->request->get('returnBase64')){
                            echo json_encode(array('response'=>array('out'=>'Success','resp_msg'=>'Upload Successful','b64img'=>'data:image/x-icon;base64,'.$str_base_64)));
                        }else {
                            echo json_encode(array('response' => array('out' => 'Success', 'resp_msg' => 'Successfully Uploaded..')));
                        }
                    }else{
                        @unlink($path.$file_name);
                        echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Updation Failed...')));
                    }
                }else{
                    echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Uploading Failed...')));
                }

            } catch (Exception $e) {
                echo json_encode(array('response'=>array('code'=>'0x000FE','resp_msg'=>'Exception'.$e->getMessage())));
            }
        }
    }

}

