<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if ( $_POST ) 
{
	$name = $_POST['name'];      
	$email = $_POST['email'];    
	$message = $_POST['message'];    

	$mail_icerik = "Merhaba Web'den mesaj var! <br>";
	$mail_icerik .= "Adı Soyadı: $name<br>";
	$mail_icerik .= "Email: $email<br>";
	$mail_icerik .= "Mesaj: $message<br>";

	require 'phpmailler/src/Exception.php';
	require 'phpmailler/src/PHPMailer.php';
	require 'phpmailler/src/SMTP.php';

	$mail = new PHPMailer(true);

	try {

		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.elasticemail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'no-reply@cenmedya.com';                     // SMTP username
		$mail->Password   = '7C29288A20F64AAAB7859160A943CDB7B7C0';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//Recipients
		$mail->setFrom('no-reply@cenmedya.com', 'Cenmedya Bilgilendirme');
		$mail->addAddress('vildanakcay36@gmail.com', 'Vildan Akçay');     



		$mail->isHTML(true);  
		$mail->CharSet = 'UTF-8';                 
		$mail->Subject = 'Sitenizden iletisim formu gönderildi.';
		$mail->Body    = $mail_icerik;
		$mail->AltBody = $mail_icerik;

		$mail->send();
	   echo '<h3 style="text-align:center; padding:20px;">Mesajınız Gönderildi.</h3>';
	   header("Refresh: 1; url=https://vildanakcay.github.io/");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}

?>
