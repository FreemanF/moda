<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Message extends CController{
    static private $options;
    
    static private function getParam($name,$default='') {
        if (self::$options===null) {
            $params = Yii::app()->params;
            self::$options = isset($params['mailOptions'])
                ? $params['mailOptions']
                : array();
        }
        return Setting::getCachedParam($name, 
            isset(self::$options[$name]) 
                ? self::$options[$name] 
                : $default);
    }
    
    static public function SendMail($message,$subject=null,$to=null,$from=null,$fromName=null){
        $mail = Yii::app()->PHPMailer;
        Yii::log('SUBJECT START: '.var_export($subject,true));
        if ($mail->Mailer=='smtp') {
            if (empty($mail->Host    )) $mail->Host     =       self::getParam('mail-smtp');
            if (empty($mail->Port    )) $mail->Port     = (int) self::getParam('mail-port');
            if (empty($mail->Username)) $mail->Username =       self::getParam('mail-username');
            if (empty($mail->Password)) $mail->Password =       self::getParam('mail-password');
        }
        
        // Значения по умолчанию
        if (empty($from)) {
            $from = self::getParam('sender-email');
            if (empty($from)) 
                $fromName='';
            else
                if (empty($fromName))
                    $fromName = self::getParam('sender-name');
        }
        if (empty($to  ))  
            $to   = self::getParam('admin-email',$mail->Username);
        
        if (empty($from)||empty($to)) {
            Yii::log('SendMail: Не указан отправитель, либо получатель');
            return FALSE;
        }
        if (is_null($fromName)) $fromName = '';

        $template = self::getParam('subject-default','<subject>');
        if (empty($subject)) $subject='';
        $subject = (strpos($template, '<subject>')===false)
            ? $template
            : str_replace ('<subject>',$subject, $template);
        
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
            Yii::log('Ошибка отправки: '.$mail->ErrorInfo);
            return FALSE;
        }else {
            Yii::log('Сообщение отправлено!');
            return TRUE;
        }
    }
    
}