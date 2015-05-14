<?php

class TestController extends \Phalcon\Mvc\Controller
{

    public function initialize(){
        if(!isset($this->session->user_data)){
            if($this->router->getControllerName()!='index' || $this->router->getControllerName()!=''){
                $this->response->redirect('http://'.$_SERVER['HTTP_HOST'].$this->url->getStaticBaseUri().'login');
            }
        }
    }
    public function indexAction()
    {

    }
    public function fetchDataAction(){
       /* echo APICall::execute(array(
            'a'=>'account',
            'sa'=>'auth',
            'unm'=>'aku@foundza.com',
            'pwd'=>'test123'
        ));*/
        print_r($this->session->user_data);
    }
    public function sendMailAction(){
        if($this->request->isPost()) {
            $message = 'There is nothing';
            $to             =   $this->request->get('to');
            $subject        =   (trim($this->request->get('subject'))!='')?trim($this->request->get('subject')):'Test Subject';
            $body           =   (trim($this->request->get('message_body'))!='')?trim($this->request->get('message_body')):'This is my test Message';
            $cc             =   (trim($this->request->get('cc'))!='')?$this->request->get('cc'):'';
            $bcc            =   (trim($this->request->get('bcc'))!='')?$this->request->get('bcc'):'';
            $msg = $this->sendMail($to,$subject,$body,$cc,$bcc);
            if($msg=='Success'){
                $message    = "Your Mail has been sent successfully!";
            }else{
                $message    = "Error in sending Mail".$msg;
            }
            $this->view->setVar('message',$message);
        }
    }

    public function fileUploadAction(){}//for the page
    public function uploadFileAction(){
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);

        echo json_encode(array('out'=>'Success','b64img'=>'data:image/x-icon;base64,'.base64_encode(file_get_contents($_FILES['file1']['tmp_name']))));

    } //actual file upload code



    private function sendMail($to,$subject,$body,$cc='',$bcc=''){
        try {
            $mail = new PHPMailer();
            $mail->Mailer = 'smtp';
            $mail->IsSMTP();
            $mail->CharSet = PHP_MAILER_CHAR_SET;
            $mail->SMTPSecure = PHP_MAILER_SMTP_SECURE;
            $mail->isHTML(1);
            $mail->Priority = 3;

            $mail->Host = PHP_MAILER_SMTP_HOST;   // SMTP server example
            $mail->SMTPDebug = PHP_MAILER_SMTP_DEBUG;  // enables SMTP debug information (for testing)
            $mail->SMTPAuth = PHP_MAILER_SMTP_AUTH;   // enable SMTP authentication
            $mail->Port = PHP_MAILER_PORT;        // set the SMTP port for the GMAIL server
            $mail->Username = PHP_MAILER_USER;        // SMTP account username example
            $mail->Password = PHP_MAILER_PASSWORD;    // SMTP account password example

            $mail->From = PHP_MAILER_FROM;
            $mail->FromName = "gotasku";



            $mail->addAddress($to);
            if ($cc != '') $mail->addCC($cc);
            if (trim($this->request->get('bcc')) != '') $mail->addBCC($this->request->get('bcc'));

            $mail->Subject = $subject;
            $mail->Body = $this->request->get('message_body');
            if($mail->send()) return 'Success';
            else return 'Error';
        }catch(phpmailerException $ex){
            return $ex->errorMessage();
        }catch(Exception $e){
            return 'Normal Exception:'.$e->getMessage();
        }
    }

}

