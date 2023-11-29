<?php
    namespace App\Libraries;
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class Phpmailer_lib{
        public function __construct(){
            log_message('Debug', 'PHPMailer class is loaded.');
        }
    
        public function load(){
            require_once APPPATH.'ThirdParty/PHPMailer/Exception.php';
            require_once APPPATH.'ThirdParty/PHPMailer/PHPMailer.php';
            require_once APPPATH.'ThirdParty/PHPMailer/SMTP.php';
    
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'b78c9f4878db7f';
            $phpmailer->Password = 'b4f74a52b601e4';
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->setFrom("asesinevil@gmail.com", "Empresa");
            $phpmailer->isHTML(true); // Si tu correo contiene codigo HTML

            return $phpmailer;
        }
    }