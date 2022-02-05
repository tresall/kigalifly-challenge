<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">

<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    echo '<meta http-equiv="refresh" content="0; url=../join.php">';
 }
include '../saver/db.php';
include_once '../header.php';
?>

<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-shipping-fast text-primary"></i> Orders</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table id="table-prod" class="table table-hover table-bordered table-striped">
                    <thead class="thead bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Grams per unit</th>
                            <th scope="col">Total mass</th>
                            <th scope="col">Date added</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sel = "SELECT * FROM products, orders, doctor WHERE products.prod_id = orders.prod_id AND doctor.doc_id = orders.doc_id ORDER BY order_id DESC";
                        $que = $c->query($sel);
                        if ($que->num_rows > 0) {
                            $no = 1;
                            while ($row = $que->fetch_assoc()) {
                                $id = $row['order_id'];
                                $pname = $row['prod_name'];
                                $qua = $row['quantity'];
                                $gram_unit = $row['gram_unit'];
                                $total_mas = $qua * $gram_unit;
                                $date = $row['date_added'];
                                $owner = $row['hosp_name'];
                                $approve = '<a href="approve.php?id=' . $id . '" class="btn btn-link"><i class="fas fa-thumbs-up"></i> Approve</a>';
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pname; ?></td>
                                    <td><?= $qua; ?></td>
                                    <td><?= $gram_unit; ?></td>
                                    <td><?= $total_mas; ?></td>
                                    <td><?= $date; ?></td>
                                    <td><?= $owner; ?></td>
                                    <td><?= $approve; ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-prod').DataTable({
            select: true
        });
    });
</script>
</body>

</html>