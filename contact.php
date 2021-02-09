<?php
$errors = '';
$myemail = 'daisyarusey.dc@gmail.com';
if(empty($_POST['username'])  ||
   empty($_POST['email']) ||
   empty($_POST['subject']) ||
   empty($_POST['message']))
{
    // print_r('no records passed');die;
    $errors .= "\n Error: all fields are required";
} else {
    
}
$name = $_POST['username'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
   
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n \n Subject $subject Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";

ini_set();
ini_set();

// print_r($email_body); die;
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
print_r(json_encode(array('status'=> 1, 'message' => 'Your message has been sent to our team. We will get back to you within 12 hours')));

} else {
    print_r('errors available'); die;
 }
?>