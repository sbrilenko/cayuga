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
        $headers .= "From: Cayuga Mobile <test@ukr.net>\r\n";
        $headers .= "Bcc: test@ukr.net\r\n";

        if(mail($to, $subject, $message, $headers))
        {
            echo "Mail send";
        }
        else
        {
            echo "Error sanding mail";
        }
    }
}