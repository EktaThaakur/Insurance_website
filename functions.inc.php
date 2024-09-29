<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('smtp/PHPMailerAutoload.php');

function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}

function get_safe_value($input)
{
    // global $conn;

    if (is_string($input) && $input !== '') {
        $data = trim($input);
        $data = stripslashes($data);
        $data = strip_tags($data); // Remove any HTML or PHP tags
        $data = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $data); // Remove script tags
        $data = htmlspecialchars($data, ENT_QUOTES);
        // $data = mysqli_real_escape_string($conn, $data);

        return $data;
    } else {
        return '';
    }
}



function redirectHere($url)
{
    echo '
        <script>
            window.location.href = "' . $url . '";
        </script>
    ';
    exit;
}

function sendMailWithAttachment($to, $subject, $msg, $attachmentPath, $form)
{
    // Your email signature
    $signature = '<br /><br /><br />This e-mail was sent from <b>' . $form . '</b> on Microtap (https://microtap.in).';

    // Append the signature to the email body
    $msg .= $signature;

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.email.tatatelebusiness.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Username = "smtp22843382";
    $mail->Password = "ess9XgOz19";
    $mail->setFrom("contactus@netambit.com", "NetAmbit");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    // Add the default email address as CC
    $mail->AddCC('contactus@microtap.in');

    // Add PDF attachment
    $mail->addAttachment($attachmentPath);

    // Add custom header for the signature
    $mail->addCustomHeader('MIME-Version: 1.0');
    $mail->addCustomHeader('Content-Type: text/html; charset=UTF-8');

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}

function sendMail($to, $subject, $msg, $form)
{
    // Your email signature....
    $signature = '<br /><br /><br />This e-mail was sent from <b>' . $form . '</b> at Microtap (https://microtap.in).';

    // Append the signature to the email body
    $msg .= $signature;

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    // $mail->Host = "smtp.email.tatatelebusiness.com";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
    $mail->Username = "contactus@microtap.in";
    $mail->Password = "rsnwcxxeljanihqt";
    // $mail->Username = "smtp22843382";
    // $mail->Password = "ess9XgOz19";
    $mail->setFrom("contactus@microtap.in", "Microtap");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    // Add the default email address as CC
    $mail->AddCC('suryamani@microtap.in');
    $mail->AddCC('lakshmi.bhanu@tappmart.com');
    // $mail->AddCC('nitesh.kumar@netambit.net');
    // Add custom header for the signature
    $mail->addCustomHeader('MIME-Version: 1.0');
    $mail->addCustomHeader('Content-Type: text/html; charset=UTF-8');

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ));

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
        return false;
    } else {
      // echo "Message sent successfully\n";
        return true;
		
    }
}

function revertMail($to, $requester)
{
    // Your email signature
    $signature = '<br /><br /><br />Thanks & Regards<br /> <b>Team Microtap</b>';
    $subject = "Confirmation Mail by Microtap";
    $msg = "Congratulations...!!<br /> Mr/Miss <b>" . $requester . "</b><br /><br /> Your request has send to the Microtap Team successfully. Our team will contact you soon..!";

    // Append the signature to the email body
    $msg .= $signature;

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    // $mail->Host = "smtp.email.tatatelebusiness.com";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
    $mail->Username = "contactus@microtap.in";
    $mail->Password = "rsnwcxxeljanihqt";
    // $mail->Username = "smtp22843382";
    // $mail->Password = "ess9XgOz19";
    $mail->setFrom("contactus@microtap.in", "Microtap");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    // Add custom header for the signature
    $mail->addCustomHeader('MIME-Version: 1.0');
    $mail->addCustomHeader('Content-Type: text/html; charset=UTF-8');

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ));

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}
// echo sendMail('rahul.pandey@netambit.net','Test','Testing message.');
