<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">

<?php 
    session_start();
    include '../saver/db.php';
    include_once '../header.php';
    $ids = $_SESSION['docid'];
?>

<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-user-md text-primary"></i> Doctor Dashboard</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <table id="table-prod" class="table table-hover table-bordered table-striped">
                    <thead class="thead bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Grams per unit</th>
                            <th scope="col">Product size</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sel = "SELECT * FROM doctor, products, orders WHERE products.prod_id = orders.prod_id AND doctor.doc_id = (orders.doc_id = '$ids') ORDER BY orders.order_date DESC";
                            $que = $c->query($sel);
                            if ($que->num_rows > 0) {
                                $no = 1;
                                while ($row = $que->fetch_assoc()) {
                                    $id = $row['prod_id'];
                                    $pname = $row['prod_name'];
                                    $qua = $row['quantity'];
                                    $gram_unit = $row['gram_unit'];
                                    $order_dt = $row['order_date'];
                                    $total_mas = $gram_unit * $qua;
                                    if ($row['received'] == 1) {
                                        $status = "Delivered";
                                    } else if ($row['received'] == 0) {
                                        $status = "Pending";
                                    }
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pname; ?></td>
                                            <td><?= $qua; ?></td>
                                            <td><?= $gram_unit; ?></td>
                                            <td><?= $total_mas; ?></td>
                                            <td><?= $order_dt; ?></td>
                                            <td><?= $status; ?></td>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script >
    $(document).ready( function () {
    $('#table-prod').DataTable({
        select: true
    });
} );
</script>
</body>

</html>