<?php
include "admin/config.php";

if(isset($_POST) && $_POST !== null) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = "amirsaifi637577@gmail.com";
    
    // Set a valid 'From' email address
    $from = "yourname@example.com"; // Replace with your email address
    
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    
    $mailSent = mail($to, $subject, $message, $headers);
    
    if ($mailSent) {
        echo "Email sent successfully.";
    } else {
        echo "Email could not be sent.";
    }
}

// $sql1 = "insert into contact (name,email,subject,message) values 
//     ('".$name."','".$email."','".$subject."','".$message."')";
//     $result=mysqli_query($conn,$sql1);
//     if(isset($result))
//     {
//     echo "data inserted successfully";

//     header("Location:contact.php");
//     }
// }
// $to = "recipient@example.com"; // Replace with the recipient's email address
// $subject = "Hello, this is a test email";
// $message = "This is a test email sent from PHP.";
// $headers = "From: yourname@example.com"; // Replace with your email address

// // Send the email
// $mailSent = mail($to, $subject, $message, $headers);



?>