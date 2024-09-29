<?php
require('functions.inc.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['enquiry_submit'])) {

    $name = get_safe_value($_POST['name']);
    $email = get_safe_value($_POST['email']);
    $mobile = get_safe_value($_POST['mobile']);
    $message = get_safe_value($_POST['message']);
    $enqury_on = date('d-M-Y');

    $subject = "Enquiry From Microtap";
    $msg = "Name: " . $name . "<br />Email: " . $email . "<br />Mobile: " . $mobile . "<br />Message: " . $message . "<br />Enqury on: " . $enqury_on;


    $res = sendMail("care@microtap.in", $subject, $msg, $name);

    if ($res) {
        revertMail($email, $name);
        redirectHere('index.php?status=success');
    }
}

if (isset($_POST['submit_form'])) {

    $name = get_safe_value($_POST['your_name']);
    $email = get_safe_value($_POST['your_email']);
    $mobile = get_safe_value($_POST['your_phone']);
    // $project = get_safe_value($_POST['project']);
    $message = get_safe_value($_POST['your_message']);
    $enqury_on = date('d-M-Y');

    $subject = "Enquiry From Microtap Contact-Us";
    $msg = "Name: " . $name . "<br />Email: " . $email . "<br />Mobile: " . $mobile . "<br />Message: " . $message . "<br />Enqury on: " . $enqury_on;
    $form = "Microtap";

    $res = sendMail("care@microtap.in", $subject, $msg, $name);

    if ($res) {
        revertMail($email, $name);
        redirectHere('index.php?status=success');
    }
}
