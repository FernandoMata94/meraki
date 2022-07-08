<?php 

include("PHPMailer/PHPMailer.php");
include("PHPMailer/SMTP.php");
include("PHPMailer/Exception.php");

try{
    $name = $_POST['name'];
	$emailTo=$_POST['email'];
	$subject=$_POST['title'];;
	$bodyEmail=$_POST['message'];

	//var_dump("121111111");die();
	$fromemail="desarrollosibermex@gmail.com";
	$fromname="Contacto Meraki";
	$host="localhost";
	$port="25";
	
	$password="ibermex123";


	$mail=new PHPMailer\PHPMailer\PHPMailer();

	$mail->isSMTP();
	$mail->SMTPDebug=0;
	$mail->Host       = $host;
	$mail->Port       = $port;
	$mail->SMTPSecure = false;
    $mail->SMTPAuth = false;
    $mail->SMTPAutoTLS = false;
	$mail->Username   = $fromemail;                     // SMTP username
    $mail->Password   = $password; 
    
    
        
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->AddReplyTo($emailTo, $name);
    $mail->setFrom($fromemail, $fromname);
    $mail->addAddress("desarrollosibermex@gmail.com");


    
    //ASUNTO
    $mail->isHTML(true);
    $mail->Subject=$subject;

    //cuerpo email
    $mail->Body=$bodyEmail;

    if($mail->send()){
        header("Location:index.html");//echo "Message Sent!";     
        echo "correcto envio";
    }
    
  
}catch(Exception $e){

}

 ?>

