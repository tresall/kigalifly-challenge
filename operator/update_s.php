<?php 
session_start();
if (!isset($_SESSION['user_type'])) {
    echo '<meta http-equiv="refresh" content="0; url=../join.php">';
 }
include '../saver/db.php';

if (isset($_POST['save'])) {
    $idd = $_POST['id'];
    $pname = $_POST['pname'];
    $pqua = $_POST['pq'];
    $masg = $_POST['mass_g'];
    $total_mass_gram = $pqua * $masg;

    $save = "UPDATE products SET prod_name = '$pname', quantity = '$pqua', gram_unit = '$masg', total_mass_g = '$total_mass_gram' WHERE prod_id = '$idd'";
    $check = $c->query($save);

    if ($check) {
        echo '<div cass="alert alert-success">Modified</div>';
        echo '<meta http-equiv="refresh"; content="0 url=manage_products.php">';
    } else {
        echo "Failed to save product info try again later.";
    }

}

?>