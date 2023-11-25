<?php
require 'vendor/autoload.php';

class SendEmail
{

    public static function SendMail($to, $subject, $content)
    {
        $key = 'API KEY NOT WORKING, EMAILS ARE NOT BEING SENT';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("sbaker20j@vtdi.edu.jm", "Stephen Baker");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);

        $sendgrid = new \SendGrid($key);

        try {
            $response = $sendgrid->send($email);
            return $response;
        } catch (Exception $e) {
            echo 'Email exception Caught : ' . $e->getMessage() . "\n";
            return false;
        }
    }
}
