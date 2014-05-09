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
        $mail = new YiiMailer();
        $mail->setFrom('from@example.com', 'John Doe');
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