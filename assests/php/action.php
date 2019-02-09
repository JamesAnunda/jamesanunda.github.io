<?php
if(isset($_POST['email'])) {

    // address and subject line
    $email_to = "cjanunda@gmail.com";
    $email_subject = "How can I help you?";

    function died($error) {
        //error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    // validation expected data exists
    if(!isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])) {
        died('We are sorry, but there appears to be a problem with the email you submitted.');
    }

    $Name = $_POST['Name']; 
    $email_from = $_POST['Email']; 
    $comments = $_POST['Message']; 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";
    
  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";
    $email_message .= "Name: ".clean_string($Name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($Message)."\n";
  }
}

