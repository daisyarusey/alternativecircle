
// if(!isset($_REQUEST['username']) || empty($_REQUEST['username'])){
// 	print_r(json_encode(array('status'=>0, 'message' => 'Please enter your name'))); exit;
// }
//validate email
// if(!isset($_REQUEST['email']) || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
// 	print_r(json_encode(array('status'=>0, 'message' => 'Please enter a valid email address'))); exit;
// }

//validate subject
// if(!isset($_REQUEST['subject']) || empty($_REQUEST['subject'])){
// 	print_r(json_encode(array('status'=> 0, 'message' => 'Please enter a subject for your message'))); exit;
// }

//validate message
// if(!isset($_REQUEST['message']) || empty($_REQUEST['message'])){
// 	print_r(json_encode(array('status'=> 0, 'message' => 'Please enter your message'))); exit;
// }

// print_r(json_encode(array('status'=> 1, 'message' => 'Your message has been sent to our team. We will get back to you within 12 hours'))); exit;


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['username','email','subject'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('message')->areRequired();




$pp->sendEmailTo('daisyarusey.dc@gmail.com'); // ← Your email here

echo $pp->process($_POST);