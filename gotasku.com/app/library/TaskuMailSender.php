<?php
/**
 * Created by PhpStorm.
 * User: Satyanarayan
 * Date: 21-05-2015
 * Time: 17:50
 */

class TaskuMailSender {
    /**
     * @param $To
     * @param $Subject
     * @param $Body
     * @param string [$FromName]
     * @param string [$Cc]
     * @param string [$Bcc]
     * @return string
     */
    public static function sendMail($To,$Subject,$Body,$FromName='',$Cc='',$Bcc=''){
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
            $mail->FromName = $FromName!=''?$FromName:"gotasku Support";

            $mail->addAddress($To);
            if ($Cc != '') $mail->addCC($Cc);
            if (trim($Bcc) != '') $mail->addBCC($Bcc);

            $mail->Subject = $Subject;
            $mail->Body = $Body;
            if($mail->send()) return 'Success';
            else return 'Error';
        }catch(phpmailerException $ex){
            return $ex->errorMessage();
        }catch(Exception $e){
            return 'Normal Exception:'.$e->getMessage();
        }
    }
}