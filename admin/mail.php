<?php


function send_mail($sender_name,$sender_email,$reciever_emails,$subject,$body)
{

  $useremail="";
  $password="";

  include_once('PHPMailerAutoload.php');
  $mail = new PHPMailer(true);

  $mail->IsSMTP(); // telling the class to use SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = $useremail; // GMAIL username
    $mail->Password = $password; // GMAIL password

    $mail->FromName = $sender_name;
    $mail->From = $sender_email;

    $mail->Subject = $subject;
    $mail->Body = $body;

  if (strpos($reciever_emails, ',') !== false)          //check if reciever_emails is single value or csv
  {
    //csv
    $rec_email_arr = explode(',',$reciever_emails);
    foreach($rec_email_arr as $rec_email)
    {
      $mail->AddAddress($rec_email);
    }
  }
  else
  {
    //single value
    $mail->AddAddress($reciever_emails);
  }

  try{
        $mail->Send();
        echo 1;
    } catch(Exception $e){
      echo "<pre>";
        var_dump($e);
    }
}
