<?php 

    session_start();
    if (!isset($_SESSION['user_type'])) {
        echo '<meta http-equiv="refresh" content="0; url=../join.php">';
     }
    include '../saver/db.php';
    $id = $_GET['id'];
    $update = "UPDATE products SET status = 0 WHERE prod_id = '$id'";
    $q = $c->query($update);
    if ($q) {
        header('location: manage_products.php');
    }



?>