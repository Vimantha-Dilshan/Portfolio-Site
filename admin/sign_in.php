<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sign In</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,900&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Start your project here-->
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="sign_in.php">
                    <img src="img/logo.png" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">

                    <div class="d-flex align-items-center">
                        <a href="../index.php" class="btn btn-danger btn-rounded me-3">
                            Proceed to website
                        </a>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>

    <br>

    <div class="container-fluid">

        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-4"></div>

                <div class="col-sm-4">
                    <div class="card  ">
                        <div class="card-header">
                            <h5 class="card-title text-center">Sign In Authentication</h5>
                        </div>
                        <div class="card-body">
                            <br>

                            <form method="POST" action="server/APIs/authentication/sign_in.php">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" />
                                    <label class="form-label" for="form2Example1">Email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="txtPassword" name="txtPassword" class="form-control" />
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
                                            <label class="form-check-label" for="form2Example34"> Remember me </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="submit" id="submit" class="btn btn-success btn-rounded btn-block mb-6">Sign in</button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Not a admin?
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-rounded btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                            <i class="fas fa-question-circle"></i>
                                        </button>
                                    </p>
                                    <p>Proceed to:</p>

                                    <a class="btn text-white btn-rounded" style="background-color: #3b5998;" href="#!" role="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    <a class="btn text-white btn-rounded" style="background-color: #dd4b39;" href="#!" role="button">
                                        <i class="fab fa-google"></i>
                                    </a>

                                    <a class="btn text-white btn-rounded" style="background-color: #0082ca;" href="#!" role="button">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>

                                    <a class="btn text-white btn-rounded" style="background-color: #333333;" href="#!" role="button">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </div>
                            </form>

                        </div>
                        <div class="card-footer text-muted text-center"><small><i class="fas fa-exclamation-circle"></i> Admin sign in</small></div>
                    </div>


                    <!-- Modal -->
                    <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="text-center" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> No Access</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger btn-rounded btn-lg">
                                            <h2>
                                                <i class="fas fa-angry"></i>
                                            </h2>
                                        </button>
                                    </div>

                                </div>
                                <div class="modal-footer text-center">
                                    <a class="text-center" href="../index.php"><button type="button" class="btn btn-success btn-rounded btn-block text-center btn-lg">Exit Safely</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4"></div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-white text-muted fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                © Copyright:
                <a class="text-reset fw-bold" href="http://vimantha.com">Vimantha Dilshan</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>