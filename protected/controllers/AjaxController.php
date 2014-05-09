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

        $to  = "mike@cayugasoft.com, eugene@cayugasoft.com, katerina@cayugasoft.com";

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
        $headers .= "From: Cayuga Mobile <mike@cayugasoft.com>\r\n";

        if(mail($to, $subject, $message, $headers))
        {
            echo "Mail send";
        }
        else
        {
            echo "Error";
        }
    }
}