<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
session_start();
include_once 'db.php';

$doc_name = $_POST['doc_ho'];
$doc_pwd = $_POST['doc_pwd'];

$pwd = md5($doc_pwd);
$select = "SELECT * FROM doctor WHERE hosp_name = '$doc_name' AND password = '$pwd'";
$result = $c->query($select);

if ($result->num_rows > 0) {
    while ($oprtr = $result->fetch_assoc()) {
        $id = $oprtr['doc_id'];
        $hosp = $oprtr['hosp_name'];
        $names = $oprtr['names'];
        $phn = $oprtr['phone_nbr'];
        $last = $oprtr['last_login'];

        $_SESSION['user_type'] = 'doctor';
        $_SESSION['docid'] = $id;
        $_SESSION['hosp'] = $hosp;
        $_SESSION['names'] = $names;

        header('location: ../doctor/');
    }
} else {
    echo '<div style="margin: 30%;" class="alert mt-5 w-25 alert-danger">
        <p>Incorrect doctor names or password.</p>
    </div>';
    echo '<meta http-equiv="refresh" content="3; url=../join.php">';
}

