<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $fromEmail=$toEmail="";
 
    if(isset($_POST['Signup']) && $_POST['fromEmail'] && $_POST['toEmail']){
        require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';

        $mail = new PHPMailer;
        
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $_POST['fromEmail'];                 // SMTP username
        $mail->Password = 'shakilahmed';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        
        $mail->From = $_POST['fromEmail'];
        $mail->FromName = 'Mailer';
        $mail->addAddress($_POST['fromEmail'], 'Joe User');     // Add a recipient
        $mail->addAddress($_POST['fromEmail']);               // Name is optional
        $mail->addReplyTo($_POST['toEmail'], 'Information');
        //$mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
        
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
       // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }



    ?>
    <h1>Smtp Validation Email</h1>
    <br>
    <br>
    <hr>

    <br>
    <br>
    <label for="fromEmail">From</label>
    <input type="text" name="fromEmail" id="fromEmail" value="<?php $fromEmail;?>">
    <br>
    <br>
    <br>
    <br>
    <label for="toEmail">To</label>
    <input type="text" name="toEmail" id="toEmail" value="<?php $toEmail;?>">
    <br>

    <br>
    <br>

    <input type="button" value="Send">


</body>

</html>