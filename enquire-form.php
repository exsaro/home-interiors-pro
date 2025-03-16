<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';
$errors = [];
$errorMessage = '';
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    if (empty($name)) {
        $errors[] = 'Name is empty';
    }
    if (empty($phone)) {
        $errors[] = 'Phone is empty';
    }
    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
    if (empty($message)) {
        $errors[] = 'Message is empty';
    }
    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();
        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'seenu888g@gmail.com';
        $mail->Password = 'yxljvkpdduinkhll';
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('seenu888g@gmail.com', 'Home Interiors Pro Website - Enquiry');
        $mail->addAddress('seenu888g@gmail.com', 'Me');
        $mail->Subject = 'New Enquiry from Home Interiors Pro Website';
        // Enable HTML if needed
        $mail->isHTML(true);
        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Phone: {$phone}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;
        
        if($mail->send()){
            echo "Success";
            header('Location: index.html'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
            echo $errorMessage;
        }
    }
}
?>