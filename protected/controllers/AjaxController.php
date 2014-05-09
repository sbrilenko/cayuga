<?php
class AjaxController extends CController {
    public function filters() {
        return array(
            'ajaxOnly + form',
        );
    }
    function actionForm(){
        $yourname = Yii::app()->request->getPost('your-name');
        $youremail = Yii::app()->request->getPost('your-email');
        $yourmessage = Yii::app()->request->getPost('your-message');

        $to  = "secret007@ukr.net" ;
        //$to .= "Kelly &lt;kelly@example.com>";

        $subject = "New contact request from Cayugamobile.com";

        $message = 'New contact request from Cayugamobile.com<br />
                        <br />
                        Name:    '.$yourname.'<br />
                        Email:   '.$youremail.'<br />
                        Message: '.$yourmessage.'<br />
                        <br />
                        Cayuga Mobile
        ';

        $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: Cayuga Mobile <cayugamobile.com>\r\n";
        $headers .= "Bcc: cayugamobile.com\r\n";

        if(mail($to, $subject, $message, $headers))
        {
            echo "Mail send";
        }
        else
        {
            echo "Error sanding mail";
        }
        die();
        $mail = new YiiMailer();
        $mail->setFrom('Cayuga Mobile', 'Cayuga Mobile');
        //$mail->setTo(array("mike@cayugasoft.com", "eugene@cayugasoft.com", "katerina@cayugasoft.com"));
        $mail->setTo("secret007@ukr.net");
        $mail->setSubject('New contact request from Cayugamobile.com');
        $mail->setBody('New contact request from Cayugamobile.com<br />
                        <br />
                        Name:    '.$yourname.'<br />
                        Email:   '.$youremail.'<br />
                        Message: '.$yourmessage.'<br />
                        <br />
                        Cayuga Mobile
        ');
        if($mail->send())
        {
            echo "Mail send";
        }
        else
        {
            echo "Error sanding mail";
        }
    }
}