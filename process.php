<!-- Form processing to send the message -->
<?php

if(isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Validate form data
    $error = false;
    
    if(empty($name)) {
        $error = true;
        $name_error = "Please enter your name.";
    }
    
    if(empty($email)) {
        $error = true;
        $email_error = "Please enter your email address.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please enter a valid email address.";
    }
    
    if(empty($phone)) {
        $error = true;
        $phone_error = "Please enter your phone number.";
    }
    
    if(empty($subject)) {
        $error = true;
        $subject_error = "Please enter the email subject.";
    }
    
    if(empty($message)) {
        $error = true;
        $message_error = "Please enter your message.";
    }
    
    // If no errors, send email
    if(!$error) {
        $to = "your-email@example.com";
        $subject = "New Contact Us Email: $subject";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\n$message";
        $headers = "From: $email\n";
        
        if(mail($to, $subject, $body, $headers)) {
            $success_message = "Thank you for contacting us! We will get back to you as soon as possible.";
        } else {
            $error_message = "Sorry, there was an error sending your message. Please try again later.";
        }
    }
}
?>

