<?php
// if(!isset($_REQUEST['username']) || empty($_REQUEST['username'])){
// 	print_r(json_encode(array('status'=>0, 'message' => 'Please enter your name'))); exit;
// }
// //validate email
// if(!isset($_REQUEST['email']) || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
// 	print_r(json_encode(array('status'=>0, 'message' => 'Please enter a valid email address'))); exit;
// }

// //validate subject
// if(!isset($_REQUEST['subject']) || empty($_REQUEST['subject'])){
// 	print_r(json_encode(array('status'=> 0, 'message' => 'Please enter a subject for your message'))); exit;
// }

// //validate message
// if(!isset($_REQUEST['message']) || empty($_REQUEST['message'])){
// 	print_r(json_encode(array('status'=> 0, 'message' => 'Please enter your message'))); exit;
// }

// print_r(json_encode(array('status'=> 1, 'message' => 'Your message has been sent to our team. We will get back to you within 12 hours'))); exit;

if(isset($_POST['submit']))
    {
        $name = $_POST['name']; // Get Name value from HTML Form
        $email_id = $_POST['email']; // Get Email Value
        $mobile_no = $_POST['mobile']; // Get Mobile No
        $msg = $_POST['message']; // Get Message Value
         
        $to = "daisyarusey.dc@gmail.com"; // You can change here your Email
        $subject = "'$name' has been sent a mail"; // This is your subject
         
        // HTML Message Starts here
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email_id</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$mobile_no</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Admin <daisyarusey.dc@gmail.com>' . "\r\n"; // Give an email id on which you want get a reply. User will get a mail from this email id
        // $headers .= 'Cc: info@websapex.com' . "\r\n"; // If you want add cc
        // $headers .= 'Bcc: boss@websapex.com' . "\r\n"; // If you want add Bcc
         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
            echo "<script>
                    alert('Mail has been sent Successfully.');
                </script>";
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('EMAIL FAILED');
                </script>";
        }
    }
?>
