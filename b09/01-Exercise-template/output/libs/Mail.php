<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Mail
{
    private $mail;
    function __construct($arr)
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $arr['usermail'];
        $this->mail->Password = $arr['password'];
        $this->mail->Port = 587;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->CharSet = ('utf-8');
        $this->mail->setFrom('enet.dinhcong.lam@gmail.com', 'Đinh Công Lâm');
    }

    function sendMail($data){
        try {
            $this->mail->addAddress($data['email']);
            $this->mail->addBCC('dclam2306@gmail.com');
            $this->mail->Subject = 'ZendVn xác nhận thông tin liên hệ';
            $this->mail->isHTML(true);
            $xhtml = '';
            $xhtml .= '<ul style="list-style:inside;">ZendVn xác nhận thông tin liên hệ của bạn gồm :';
            foreach ($data as $key => $value) {
                $xhtml .= '<li><b>' . ucfirst($key) . ':</b> ' . $value . ' </li>';
            }
            $xhtml .=  '</ul>';
            $this->mail->Body = $xhtml;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
