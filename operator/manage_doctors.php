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
    <h2 class="mb-4"><i class="fas fa-cog text-primary"></i> Manage Doctors</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table id="table-prod" class="table table-hover table-bordered table-striped">
                    <thead class="thead bg-primary text-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor Names</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sel = "SELECT * FROM doctor WHERE status = 1 ORDER BY doc_id";
                            $que = $c->query($sel);
                            if ($que->num_rows > 0) {
                                $no = 1;
                                while ($row = $que->fetch_assoc()) {
                                    $id = $row['doc_id'];
                                    $doc_names = $row['names'];
                                    $hospital = $row['hosp_name'];
                                    $phone_nbr = $row['phone_nbr'];
                                    $date = $row['register_dt'];
                                    $update = '<a href="update_doc.php?id='.$id.'&n='.$doc_names.'&q='.$hospital.'&gu='.$phone_nbr.'" class="btn btn-outline-primary mr-1"><i class="fas fa-edit"></i></a>';
                                    $delete = '<a href="delete_doc.php?id='.$id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $doc_names; ?></td>
                                            <td><?= $hospital; ?></td>
                                            <td><?= $phone_nbr; ?></td>
                                            <td><?= $date; ?></td>
                                            <td><?= $update . $delete; ?></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>

