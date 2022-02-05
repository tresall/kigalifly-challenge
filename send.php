<?php
require_once 'tdt.php';
require_once 'saver/db.php';
require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$names = $_POST['fullname'];
$email = $_POST['email'];
$msg = $_POST['message'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p class='text-danger'>Invalid Email</p>";
    $ok = false;
} else {
    $ok = true;
}

$account_sid = TWILIO_ACCOUNT_SID;
$auth_token = TWILIO_AUTH_TOKEN;
$twilio_number = TWILIO_PHONE_NUMBER;

$twilio = new Client($account_sid, $auth_token);
$message = $twilio->messages->create(
    '+250783006902',
    array(
        'from' => $twilio_number,
        "messagingServiceSid" => "MGb443dcbd56af161bc005be43c096dcbe",
        'body' => "Hi am $names \nEmail: $email\n message: $msg",
        'statusCallback' => 'https://webhook.site/f4544b30-8105-4cdf-9985-3f506950b713'
    )
);
$sid = $message->sid;

if ($ok === true) {
    $keep = "INSERT INTO messages(sndr_nm, sndr_mail, sndr_msg, twl_id) VALUES (?, ?, ?, ?)";
    $stmt = $c->prepare($keep);
    $stmt->bind_param("ssss", $names, $email, $msg, $sid);
    $stmt->execute();
    if ($stmt->close()) {
        echo "<p><i class='fa fa-bell'></i> Your Message sent at <span class='text-info'>KigaliFly.</span> Thank you.</p>";
    }
}
