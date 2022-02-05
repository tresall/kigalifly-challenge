<?php
session_start();
include '../saver/db.php';
include_once '../header.php';

$id = $_GET['id'];
$name = $_GET['n'];
$q = $_GET['q'];
$tm = $_GET['tm'];
$mg = $_GET['mg'];
$url = 'process_order.php?id=' . $id . '&n=' . $name . '&q=' . $q . '&tm=' . $tm . '&mg=' . $mg . '';

// checking

if (isset($_POST['order'])) {
    $dc_id = $_SESSION['docid'];
    $id = $_POST['id'];
    $name = $_POST['pname'];
    $quantity = $_POST['qua'];
    $mass_g = $_POST['mass_g'];
    $total_mass = $_POST['total_ma'];
    $userQ = $_POST['pq'];

    $user_grm = $mass_g * $userQ;
    if ($user_grm <= 1800 && $quantity >= $userQ) {
        $insert = "INSERT INTO orders (prod_id, quantity, doc_id) VALUES ('$id', '$userQ', '$dc_id')";
        $save = $c->query($insert);
        $left_quantity = $quantity - $userQ;
        $left_total_grams = $left_quantity * $mass_g;
        $update = "UPDATE products SET quantity = '$left_quantity', total_mass_g = '$left_total_grams' WHERE prod_id = '$id'";
        $r = $c->query($update);

        echo '<meta http-equiv="refresh" content="0; url=index.php">';
    } else {
        echo 'You\'ve selected large amount please reduce.';
    }
}
?>
<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-shipping-fast text-primary"></i> Order <?= $name; ?></h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= $url; ?>" method="post" id="new">

                    <div class=" mb-2">
                        <div class="msgS alert alert-warning">
                            Please remember we only ship less than <strong> 1.8Kg </strong> (1800g)
                        </div>
                        <label for="pname" class="form-label">Product Name*</label>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="qua" value="<?= $q; ?>">
                        <input type="hidden" name="mass_g" value="<?= $mg; ?>">
                        <input type="hidden" name="total_ma" value="<?= $tm; ?>">
                        <input type="text" name="pname" required value="<?= $name; ?>" placeholder="Enter Product Name.." class="form-control border-1">
                    </div>
                    <div class=" mb-2">
                        <label for="pqua" class="form-label">Product Quantity*</label>
                        <input type="number" name="pq" required id="pqua" placeholder="Enter Product Quantity.." class="form-control border-1">
                    </div>
                    <button type="submit" name="order" class="btn btn-success float-end"><i class="fas fa-clipboard-list"></i> Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>

</html>