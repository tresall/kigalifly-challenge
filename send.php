<?php
require_once 'saver/db.php';


$names = $_POST['fullname'];
$email = $_POST['email'];
$msg = $_POST['message'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p class='text-danger'>Invalid Email</p>";
} else {
    $keep = "INSERT INTO messages(sndr_nm, sndr_mail, sndr_msg) VALUES (?, ?, ?)";
    $stmt = $c->prepare($keep);
    $stmt->bind_param("sss", $names, $email, $msg);
    $stmt->execute();
    if ($stmt->close()) {
        echo "<p><i class='fa fa-bell'></i> Your Message sent at <span class='text-info'>KigaliFly.</span> Thank you.</p>";
    }
}
?>