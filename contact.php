<?php
$name = $_REQUEST['username'];
$email= $_REQUEST['email'];
$subject= $_REQUEST['subject'];
$message=$_REQUEST['message'];

if(empty($name) || empty($email) || empty($subject) || empty($message)){
	echo("Please fill all the fields");
}
else{
	mail("daisyarusey.dc@gmail.com",$subject,"From: $name <$email>");
	echo"<script type='text/javascript' >alert('your message sent successfully.)</script>";

	window.history.log(-1);
}

?>