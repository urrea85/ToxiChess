<?php>
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name'] && isset($_POST['email']))){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "stmp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "sltoxichess@gmail.com";
    $mail->Password = 'dssmolamucho123';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("sltoxichess@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status="success";
        $response = "Email is sent!";
    }
    else{
        $status="failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}
<?>