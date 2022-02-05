<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <title>KigaliFly</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-5 offset-md-3 text-center">
                <div class="card border-0">
                    <div class="card-title">
                        <h3><img src="images/favicon.ico" onclick="window.location.href='index.html'"> KigaliFly</h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-doctor-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-doctor" type="button" role="tab" aria-controls="pills-doctor"
                                    aria-selected="true">Doctor</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-operator-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-operator" type="button" role="tab"
                                    aria-controls="pills-operator" aria-selected="false">Operator</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-doctor" role="tabpanel"
                                aria-labelledby="pills-doctor-tab">
                                <form action="saver/logDoc.php" method="post">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" name="doc_ho" id="floatingInput"
                                            placeholder="Hospital Name">
                                        <label for="floatingInput">Hospital Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="doc_pwd" id="floatingInput"
                                            placeholder="Password">
                                        <label for="floatingInput">Password</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="submit" class="btn btn-outline-success rounded-3">Login</button>
                                    </div>
                                </form>
                                <div class="alert alert-warning">
                                    <p>Doctor's are registered by authorized system operator. contact <a
                                            href="www.kigalifly.rw">KigaliFly</a> to be registered</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-operator" role="tabpanel"
                                aria-labelledby="pills-operator-tab">
                                <form action="saver/logOp.php" method="post">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control " name="op_names" id="floatingInput"
                                            placeholder="Phone Number">
                                        <label for="floatingInput">Operator names</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="op_pwd" id="floatingInput"
                                            placeholder="Password">
                                        <label for="floatingInput">Password</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <button type="submit"
                                            class="btn btn-outline-primary rounded-3">continue</button>
                                    </div>
                                </form>
                                <div class="alert alert-warning">
                                    <p>Operator's are registered by authorized system admin. contact <a
                                            href="www.kigalifly.rw">KigaliFly</a> to be registered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>