<?php

  function filter($form_field) {
     return preg_replace('/[\0\n\r\|\!\/\<\>\^\$\%\*\&]+/','',$form_field);
  }

  function isGuest($password) {
    if ($password == '5926') {
      return True;
    }
    return False;
  }

  $password = filter($_POST['password']);
  $name = filter($_POST['name']);
  $attending = $_POST['attending'];
  $numguests = filter($_POST['numguests']);
  $message = filter($_POST['message']);

  $email_from = "mail.matthewandrahel.com";
  $email_subject = "$name: $numguests guests";
	$email_body = "Name: $name\nAttending: $attending\nNumber of Guests: $numguests\nMessage: $message";

  $to = "matthewandrahel@gmail.com";
  $headers = "From: $email_from \r\n";

  if (isGuest($password)) {
    $sent = mail($to,$email_subject,$email_body,$headers);
    echo "Thank you for RSVPing!";
  }
  else {
    $sent = False;
    echo "Ooops, something went wrong :/";
  }
?>
