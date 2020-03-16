<?php

  function isGuest($pw) {
    if ($pw == '5926') {
      return True;
    }
    return False;
  }

  $password = $_POST['password'];
  $name = urldecode($_POST['name']);
  $attending = $_POST['attending'];
  $numguests = $_POST['numguests'];
  $message = $_POST['message'];

  $email_from = "mail.matthewandrahel.com";
  $email_subject = "$name: $numguests guests";
	$email_body = "Name: $name\nAttending: $attending\nNumber of Guests: $numguests\nMessage: $message";

  $to = "matthewandrahel@gmail.com";
  $headers = "From: $email_from \r\n";

  if (!isGuest($password)) {
    $sent = False;
    echo "The registration password you entered is incorrect";
  }
  else {
    $sent = mail($to,$email_subject,$email_body,$headers);
  }

  if ($sent) {
    echo "Thank you for RSVPing! We'll see you there!";
  }
  else {
    echo "There was an issue with your submission. Please try again!";
  }
?>
