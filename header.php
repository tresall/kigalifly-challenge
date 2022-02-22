<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/cf03def005.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/style.css">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<link rel="manifest" href="images/site.webmanifest">
<title>Inventory management and order processing system at KigaliFly</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="bg-primary">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="mt-1 mb-2">
                <?php if ($_SESSION['user_type'] == 'operator') : ?>
                    <img src="../images/profile.png" width="100px" class="img-fluid mx-auto d-block rounded-circle">
                    <p class="text-center d-block"><i class="fas fa-circle text-success"></i> Operator</p>
                <?php elseif ($_SESSION['user_type'] == 'doctor') : ?>
                    <img src="../images/pro_doc.png" width="100px" class="img-fluid mx-auto d-block rounded-circle">
                    <p class="text-center d-block"><i class="fas fa-circle text-success"></i> Doctor</p>
                <?php endif; ?>
            </div>
            <div class="p-4 pt-5">
                <h1><a href="" class="logo">KigaliFly</a> </h1>
                <ul class="list-unstyled components mb-5">
                    <?php if ($_SESSION['user_type'] == 'operator') : ?>
                        <li class="active">
                            <a href="index.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-boxes"></i> Inventory</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu1">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-folder-plus"></i> New product</a>
                                </li>
                                <li>
                                    <a href="manage_products.php"><i class="fas fa-tasks"></i> Manage</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-shipping-fast"></i> Orders</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu2">
                                <li>
                                    <a href="manage_orders.php"><i class="fas fa-tasks"></i> Manage</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-briefcase-medical"></i> Doctors</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu3">
                                <li>
                                    <a href=""><i class="fas fa-user-nurse"></i> New doctor</a>
                                </li>
                                <li>
                                    <a href="manage_doctors.php"><i class="fas fa-tasks"></i> Manage</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="ship.php"><i class="fas fa-dolly"></i> Shipments</a>
                        </li>

                        <li class="mt-3">
                            <div class="dropdown w-100">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/profile.png" width="40px" class="rounded-circle">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-dark py-0" href="setting.php"><i class="fa fa-cogs"></i> Settings</a>
                                    <a class="dropdown-item text-danger py-0 my-1" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if ($_SESSION['user_type'] == 'doctor') : ?>
                        <li class="active">
                            <a href="index.php" class="active"><i class="fa fa-boxes"></i> Inventory</a>
                        </li>
                        <li class="">
                            <a href="orders.php"><i class="fas fa-shipping-fast"></i> Orders</a>
                        </li>

                        <li class="mt-3">
                            <div class="dropdown w-100">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../images/pro_doc.png" width="40px" class="rounded-circle">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-danger py-0 my-1" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>


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