<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
session_start();
include_once 'db.php';

$op_name = $_POST['op_names'];
$op_pwd = $_POST['op_pwd'];

$pwd = md5($op_pwd);
$select = "SELECT * FROM operators WHERE op_name = '$op_name' AND op_pwd = '$pwd'";
$result = $c->query($select);

if ($result->num_rows > 0) {
    while ($oprtr = $result->fetch_assoc()) {
        $id = $oprtr['op_id'];
        $name = $oprtr['op_name'];
        $phn = $oprtr['op_phone'];
        $last = $oprtr['last_login'];

        $_SESSION['user_type'] = 'operator';
        $_SESSION['opid'] = $id;
        $_SESSION['name'] = $name;

        header('location: ../operator/');
    }
} else {
    echo '<div style="margin: 30%;" class="alert mt-5 w-25 alert-danger">
        <p>Incorrect operator names or password.</p>
    </div>';
    echo '<meta http-equiv="refresh" content="3; url=../join.php">';
}

