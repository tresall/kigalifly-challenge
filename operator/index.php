<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    header('location: ../join.php');
}
include '../saver/db.php';
include_once '../header.php';

// Saving new product
if (isset($_POST['save'])) {
    $pname = $_POST['pname'];
    $pqua = $_POST['pq'];
    $masg = $_POST['mass_g'];
    $total_mass_gram = $pqua * $masg;

    $save = "INSERT INTO products(prod_name, quantity, gram_unit, total_mass_g) 
    VALUES ('$pname', '$pqua', '$masg', '$total_mass_gram')";
    $check = $c->query($save);

    if ($check) {
        echo '<div cass="alert alert-success">Added</div>';
        echo '<meta http-equiv="refresh"; content="2 url=index.php">';
    } else {
        echo "Failed to save product info try again later.";
    }

}

$prd = "SELECT COUNT(prod_id) AS total FROM products WHERE status = 1";
$prod = $c->query($prd);
$result = $prod->fetch_assoc();

$ord = "SELECT COUNT(*) AS total FROM orders";
$orde = $c->query($ord);
$order = $orde->fetch_assoc();

$doct = "SELECT COUNT(*) AS total FROM doctor";
$qd = $c->query($doct);
$dc = $qd->fetch_assoc();

$ship = "SELECT COUNT(*) AS total FROM orders WHERE received = 1";
$qd = $c->query($ship);
$finished = $qd->fetch_assoc();

$sp = "SELECT COUNT(*) AS total FROM orders WHERE received = 0";
$qs = $c->query($sp);
$not = $qs->fetch_assoc();
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-folder-plus"></i> New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" id="new">
            <div class=" mb-2">
                <label for="pname" class="form-label">Product Name*</label>
                <input type="text" name="pname" required id="pname" placeholder="Enter Product Name.." class="form-control border-1">
            </div>
            <div class=" mb-2">
                <label for="pqua" class="form-label">Product Quantity*</label>
                <input type="number" name="pq" required id="pqua" placeholder="Enter Product Quantity.." class="form-control border-1">
            </div>
            <div class=" mb-2">
                <label for="msg" class="form-label">Mass Grams per unit*</label>
                <input type="number" name="mass_g" required id="msg" placeholder="Enter Mass Grams.." class="form-control border-1">
            </div>
            <button type="submit" name="save" class="btn btn-success float-end">Save to inventory</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Page Content  -->
<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-tachometer-alt"></i> Operator Dashboard</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-3 mr-3 mb-2 bg-primary rounded text-light py-1">
                        <h6 class="title">Total products</h6>
                        <div class="content display-4"><?= $result['total']; ?></div>
                    </div>
                    <div class="col-3 mr-3 mb-2 bg-primary rounded text-light py-1">
                        <h6 class="title">Total orders</h6>
                        <div class="content display-4"><?= $order['total']; ?></div>
                    </div>
                    <div class="col-3 mr-3 mb-2 bg-primary rounded text-light py-1">
                        <h6 class="title">Registered doctors</h6>
                        <div class="content display-4"><?= $dc['total']; ?></div>
                    </div>
                    <div class="col-3 mr-3 mb-2 bg-primary rounded text-light py-1">
                        <h6 class="title">Approved Shipments</h6>
                        <div class="content display-4"><?= $finished['total']; ?></div>
                    </div>
                    <div class="col-3 mr-3 mb-2 bg-primary rounded text-light py-1">
                        <h6 class="title">Pending Shipments</h6>
                        <div class="content display-4"><?= $not['total']; ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
</body>

</html>
