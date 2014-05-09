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

        $html = 'New contact request from Cayugamobile.com<br />
                        <br />
                        Name:    '.$yourname.'<br />
                        Email:   '.$youremail.'<br />
                        Message: '.$yourmessage.'<br />
                        <br />
                        Cayuga Mobile
        ';
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: Cayuga Mobile <self::SELFEMAIL>\r\n";
        if(mail("secret007@ukr.net", 'New contact request from Cayugamobile.com', $html, $headers))
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