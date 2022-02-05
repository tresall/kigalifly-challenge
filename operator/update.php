<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    echo '<meta http-equiv="refresh" content="0; url=../join.php">';
 }
include '../saver/db.php';
include_once '../header.php';

    $id = $_GET['id'];
    $name = $_GET['n'];
    $q = $_GET['q'];
    $gu = $_GET['gu'];

?>

<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-boxes text-primary"></i> Update product</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="update_s.php" method="post" id="new">
            <div class=" mb-2">
                <label for="pname" class="form-label">Product Name*</label>
                <input type="hidden" name="id" value="<?= $id?>">
                <input type="text" name="pname" required id="pname" value="<?=$name; ?>" placeholder="Enter Product Name.." class="form-control border-1">
            </div>
            <div class=" mb-2">
                <label for="pqua" class="form-label">Product Quantity*</label>
                <input type="number" name="pq" required id="pqua" value="<?=$q; ?>" placeholder="Enter Product Quantity.." class="form-control border-1">
            </div>
            <div class=" mb-2">
                <label for="msg" class="form-label">Mass Grams per unit*</label>
                <input type="number" name="mass_g" required id="msg" value="<?=$gu; ?>" placeholder="Enter Mass Grams.." class="form-control border-1">
            </div>
            <button type="submit" name="save" class="btn btn-success float-end">Save changes</button>
        </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</script>
</body>

</html>

