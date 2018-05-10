<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Mail extends CController{
    
    static public function SendMail($to,$from,$fromName,$subject,$message){
        $mail = Yii::app()->PHPMailer;
        $subject = "=?utf-8?b?" . base64_encode($subject) . "?=";
        $mail->Subject = $subject;
        $mail->SetFrom($from, $fromName);
        $mail->AddAddress($to,"");
        $mail->IsSMTP();
        $mail->IsHtml(true);
        $mail->CharSet = 'utf-8';
        $mail->SMTPSecure = 'ssl';
        $mail->MsgHTML($message);
        $mail->AltBody = '';
        if(!$mail->Send()) {
            Yii::log("Ошибка отправки: ".$mail->ErrorInfo);
            return FALSE;
        }else {
            Yii::log("Сообщение отправлено!");
            return TRUE;
        }
    }
    
}