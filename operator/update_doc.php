<?php
session_start();
if (!isset($_SESSION['user_type'])) {
    echo '<meta http-equiv="refresh" content="0; url=../join.php">';
 }
include '../saver/db.php';
include_once '../header.php';

if (isset($_POST['save'])) {
    $ids = $_POST['id'];
    $dname = $_POST['dname'];
    $hosp = $_POST['hosp'];
    $phn = $_POST['phn'];

    $save = "UPDATE doctor SET names = '$dname', hosp_name = '$hosp', phone_nbr = '$phn' WHERE doc_id = '$ids'";
    $check = $c->query($save);
    if ($check) {    
        echo '<meta http-equiv="refresh" content="0; url=manage_doctors.php">';
    } else {
        echo  '<meta http-equiv="refresh" content="0; url=manage_doctors.php">';
    }
}

   if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['n'];
    $q = $_GET['q'];
    $gu = $_GET['gu'];

   }
?>
<div id="content" class="p-2 p-md-5 pt-5">
    <h2 class="mb-4"><i class="fas fa-boxes text-primary"></i> Update doctor</h2>
    <hr class="py-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="update_doc.php" method="post">
            <div class=" mb-2">
                <label for="pname" class="form-label">Doctor Names*</label>
                <input type="hidden" name="id" value="<?= @$id; ?>">
                <input type="text" name="dname" required id="dname" value="<?=$name; ?>" placeholder="Enter Doctors Name.." class="form-control">
            </div>
            <div class=" mb-2">
                <label for="pqua" class="form-label">Hospital Name*</label>
                <input type="text" name="hosp" required id="pqua" value="<?= @$q; ?>" placeholder="Enter Hospital Name.." class="form-control ">
            </div>
            <div class=" mb-2">
                <label for="msg" class="form-label">Phone number *</label>
                <input type="number" name="phn" required id="msg" value="<?= @$gu; ?>" placeholder="Enter Phone Number.." class="form-control ">
            </div>
            <button type="submit" name="save" class="btn btn-success float-end">Save changes</button>
        </form>
            </div>
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

