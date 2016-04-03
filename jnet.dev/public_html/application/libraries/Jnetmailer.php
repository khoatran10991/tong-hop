<?php
/*
 * Libraries sent mail to user
 * Author: Sang Nguyen
 * Date update : 25/01/2016
 * JNET Team
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Jnetmailer {
	public $protocol	= 'smtp';		// mail/sendmail/smtp


	public $smtp_host	= 'email-smtp.us-east-1.amazonaws.com';

	public $smtp_user	= 'AKIAJGL2FLFCARS4DN5Q';

	public $smtp_pass	= 'Ap5d1hWEr3yKMdsR08WYsV1LNjNbAwETpP+1XrWXJE77';
	
	public $smtp_port	= 587;
	public $smtp_crypto	= 'tls';
	public $from = 'no-reply@jnet.vn';
	public $from_name = 'JNET SERVICE';
	public $isHTML = true;
	public $ubject = "";
	public $message = "";
	function __construct()
	{
			# code...
			
			require 'mailer/PHPMailerAutoload.php';
			
			
	}
	public function resetpass($toEmail,$webURL,$key,$message){
		//code here ...
		$mail = new PHPMailer;
		$mail->CharSet = "utf8";
		//$mail->CharSet = "UTF-8";
		$mail->isHTML($this->isHTML);
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $this->smtp_host;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $this->smtp_user;                // SMTP username
		$mail->Password = $this->smtp_pass;                          // SMTP password
		$mail->SMTPSecure = $this->smtp_crypto;                          // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
			
		$mail->From = 'no-reply@jnet.vn';
		$mail->FromName = 'JNET SERVICE';
		$mail->Subject = 'Khôi phục mật khẩu đăng nhập '.$webURL;
		$mail->Body = $message;
		$mail->addAddress($toEmail);
		if($mail->send())
			return true;
		else
			return false;
	}
	public function welcome($toEmail,$username,$message) {
		$mail = new PHPMailer;
		$mail->CharSet = "utf8";
		//$mail->CharSet = "UTF-8";
		$mail->isHTML($this->isHTML);
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $this->smtp_host;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $this->smtp_user;                // SMTP username
		$mail->Password = $this->smtp_pass;                          // SMTP password
		$mail->SMTPSecure = $this->smtp_crypto;                          // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
			
		$mail->From = 'no-reply@jnet.vn';
		$mail->FromName = 'JNET SERVICE';
		$mail->Subject = 'Tạo website thành công '.$username.'.jnet.vn';
		$mail->Body = $message;
		$mail->addAddress($toEmail);
		if($mail->send())
			return true;
		else
			return false;
	}

}
/* File Mycar.php */
	