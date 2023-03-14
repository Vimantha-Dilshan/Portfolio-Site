<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: sign_in.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Home</title>
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
                <a class="navbar-brand me-2" href="home.php">
                    <img src="img/logo.png" height="35" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
                </a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="education.php">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="work.php">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="projects.php">Projects</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center">
                        <a href="comments.php" class="btn btn-success btn-rounded me-3">
                            Comments
                        </a>
                        <a class="btn btn-rounded btn-dark px-3 me-3" href="https://github.com/Vimantha-Dilshan" role="button"><i class="fab fa-github"></i></a>
                        <a class="btn btn-rounded btn-primary px-3 me-3" href="https://www.linkedin.com/in/vimantha-dilshan-6b64501b6/" role="button"><i class="fab fa-linkedin-in"></i></a>
                        <!-- Avatar -->
                        <div class="dropdown me-3">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="server/APIs/uploads/profile/profile.jpg" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li class="text-center">
                                    <?php
                                    include 'server/config/database_config.php';

                                    $adminID = $_SESSION['user'];

                                    $sql = "SELECT * FROM `authentication` WHERE `email` LIKE '$adminID' ";
                                    $result = $conn->query($sql);


                                    if (!empty($result) && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a class='dropdown-item' href='profile.php'>" . $row["username"] . "</a>";
                                            echo "<small class='text-muted'>" . $row["access_level"] . "</small>";
                                        }
                                    }
                                    $conn->close();
                                    ?>
                                    <!--<a class="dropdown-item">Vimantha Dilshan</a>
                                    <small class="text-muted">Super Admin</small>-->
                                </li>
                                <li class="text-center">
                                    <a href="server/APIs/authentication/sign_out.php"><button type="button" class="btn btn-outline-success btn-rounded btn-sm" data-mdb-ripple-color="dark">Sign out</button></a>
                                </li>
                                <br>
                            </ul>
                        </div>
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

        <div class="row">
            <div class="container">
                <h2>Dashboard</h2>
                <p class="text-success fw-bold">Portfolio Summary</p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <section>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="server/APIs/uploads/profile/profile.jpg" alt="Generic placeholder image" class="img-fluid shadow-4" style="width: 180px; border-radius: 10px;">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="mb-1">Vimantha Dilshan</h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">Software Engineer</p>
                                        <div class="card" style="background-color: #efefef;">
                                            <div class="row">
                                                <?php
                                                include 'server/config/database_config.php';

                                                $adminID = $_SESSION['user'];

                                                $sql = "SELECT COUNT(id) AS total FROM projects WHERE `status` = 'Upcomming'";
                                                $result = $conn->query($sql);


                                                if (!empty($result) && $result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<div class='col-sm-4'>";
                                                        echo "<p class='small text-muted mb-1 text-center'><i class='fas fa-forward'></i></p>";
                                                        echo "<p class='mb-0 text-center'><span class='badge badge-danger'>" . $row["total"] . "</span></p>";
                                                        echo "</div>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>

                                                <?php
                                                include 'server/config/database_config.php';

                                                $adminID = $_SESSION['user'];

                                                $sql = "SELECT COUNT(id) AS total FROM projects WHERE `status` = 'Ongoing'";
                                                $result = $conn->query($sql);


                                                if (!empty($result) && $result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<div class='col-sm-4'>";
                                                        echo "<p class='small text-muted mb-1 text-center'><i class='fas fa-sync-alt'></i></p>";
                                                        echo "<p class='mb-0 text-center'><span class='badge badge-info'>" . $row["total"] . "</span></p>";
                                                        echo "</div>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>

                                                <?php
                                                include 'server/config/database_config.php';

                                                $adminID = $_SESSION['user'];

                                                $sql = "SELECT COUNT(id) AS total FROM projects WHERE `status` = 'Completed'";
                                                $result = $conn->query($sql);


                                                if (!empty($result) && $result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<div class='col-sm-4'>";
                                                        echo "<p class='small text-muted mb-1 text-center'><i class='fas fa-check-circle'></i></p>";
                                                        echo "<p class='mb-0 text-center'><span class='badge badge-success'>" . $row["total"] . "</span></p>";
                                                        echo "</div>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>

                                                <!--
                                                <div class="col-sm-4">
                                                    <p class="small text-muted mb-1">Upcomming</p>
                                                    <p class="mb-0"><span class="badge badge-danger">10</span></p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="small text-muted mb-1">Ongoing</p>
                                                    <p class="mb-0"><span class="badge badge-info">03</span></p>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="small text-muted mb-1">Completed</p>
                                                    <p class="mb-0"><span class="badge badge-success">20</span></p>
                                                </div>-->
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <a href="profile.php"><button type="button" class="btn btn-outline-secondary btn-rounded me-1 flex-grow-1"><i class="fas fa-user-alt"></i> Profile</button></a>
                                                    <a href="projects.php"><button type="button" class="btn btn-success btn-rounded flex-grow-1"><i class="fas fa-chart-area"></i> Manager</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <br>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Recent Blogs</p>
                                <button type="button" class="btn btn-dark btn-sm btn-rounded"><i class="fas fa-plus"></i> Create</button>
                            </div>

                            <div class="col-sm-6 d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Carousel wrapper -->
                        <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
                            <!-- Controls -->
                            <div class="d-flex justify-content-center">
                                <button class="carousel-control-prev position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next position-relative" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Inner -->
                            <div class="carousel-inner py-3">
                                <!-- Single item -->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <!--Section: News of the day-->
                                        <div class="col-md-3">
                                            <br>
                                            <br>
                                            <br>
                                            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/slides/080.webp" class="img-fluid" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <span class="badge bg-danger start-left">2022 SEP 12</span>
                                            <br>
                                            <h7 class="start-left"><strong>Facilis consequatur eligendi</strong></h7>
                                            ,<small>
                                                <p class="text-muted fw-light blog-card-text">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
                                                    eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
                                                    sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
                                                </p>
                                            </small>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-external-link-alt"></i></button>
                                            </div>

                                        </div>

                                        <!--Section: News of the day-->
                                    </div>
                                </div>

                                <!-- Single item -->
                                <div class="carousel-item">
                                    <div class="row">
                                        <!--Section: News of the day-->

                                        <div class="col-md-3">
                                            <br>
                                            <br>
                                            <br>
                                            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                                                <img src="https://mdbcdn.b-cdn.net/img/new/slides/080.webp" class="img-fluid" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <span class="badge bg-danger start-left">2022 OCT 16</span>
                                            <br>
                                            <h7 class="start-left"><strong>Facilis consequatur eligendi</strong></h7>
                                            <small>
                                                <p class="text-muted fw-light blog-card-text">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
                                                    eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
                                                    sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
                                                </p>
                                            </small>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-outline-secondary btn-rounded"><i class="fas fa-external-link-alt"></i></button>
                                            </div>
                                        </div>


                                        <!--Section: News of the day-->
                                    </div>
                                </div>

                            </div>
                            <!-- Inner -->
                        </div>
                        <!-- Carousel wrapper -->
                    </div>
                </div>


            </div>

            <div class="col-sm-8">

                <br>

                <div class="card  ">
                    <div class="card-body">
                        <script src="https://cdn.logwork.com/widget/text.js"></script>
                        <a href="https://logwork.com/current-time-in-sri-jayewardenepura-kotte-sri-lanka-western" class="clock-widget-text" data-timezone="Asia/Colombo" data-language="en" data-textcolor="#14a44d" data-digitscolor="#a8aaad">Today is:</a>
                    </div>
                </div>
            </div>
        </div>

        <br>


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