<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('config.php');

$email = 'digital@paradigmrealty.co.in';

if(!empty($_REQUEST['username']))
{
	$username = $_REQUEST['username'];
}
else
{
	$username = '';
}

$sql = "select * from `admin_user` where `username` = '".$username."'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0)
{
    //   $reciever = $email;
    //      $subject = "Paradigm - Password Reset";
         
    //      $body = "<b>This is password reset link for paradigm admin panel</b><br>";
    //      $body .= '<a href="http://paradigmrealty.co.in/admin/reset.php?username='.$username.'">Reset your password.</a>';
    //     $sender_email = "mailerfe@gmail.com";

    //     $sender_password = "f3e6f3e6";



    //     $reciever =$email;
        
        $to = $email;
         $subject = "Paradigm - Password Reset";
         
         $message ="<b>This is password reset link for paradigm admin panel</b><br>";
         $message .= '<a href="http://paradigmrealty.co.in/admin/reset.php?username='.$username.'">Reset your password.</a>';
         
         $header = "From:mailerfe@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);

       // $retval=send_mail($reciever,$subject,$body,$sender_email,$sender_password);
         
         if( $retval ) {
           	$_SESSION['login_msg'] = 'Password reset link send on registered email Id';
	header('Location: index.php');
         }else {
           	$_SESSION['login_msg'] = 'Something Went Wrong';
	header('Location: forgotpassword.php');
         }

}
else
{
	$_SESSION['login_msg'] = 'Invalid Username';
	header('Location: forgotpassword.php');
}

  function send_mail($reciever,$subject,$body,$sender_email,$sender_password,$attachment = null)

    {

        include_once('PHPMailerAutoload.php');

        $mail = new PHPMailer(true);

        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->IsHTML(true); //

        $mail->SMTPAuth = true; // enable SMTP authentication

        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier

        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server

        $mail->Port = 465; // set the SMTP port for the GMAIL server

        $mail->SetFrom('mailerfe@gmail.com');

        $mail->Username = $sender_email; // GMAIL username

        $mail->Password = $sender_password; // GMAIL password

        // $mail->AddAddress('nirmeet@firsteconomy.com');

        $mail->AddAddress($reciever);

        if($attachment != null && $attachment != '')

        {

            $mail->addAttachment($attachment);

        }

        $mail->Subject = $subject;

        $mail->Body = $body;

        try{

            $mail->Send();

                    //New register

        } catch(Exception $e){
            echo $e;die();
              // something went wrong

        }

    }


