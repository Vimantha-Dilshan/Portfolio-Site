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
    <title>Profile</title>
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
                            <a class="nav-link" href="home.php">Home</a>
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

            <div class="col-sm-12">
                <div class="card  ">
                    <div class="card-header">
                        <h5 class="card-title">Profile</h5>
                    </div>
                    <div class="card-body">

                        <div class="container">

                            <div class="row">
                                <div class="col-lg-4">
                                    <?php
                                    // Establish the Connection
                                    include 'server/config/database_config.php';

                                    $sql = "SELECT * from profile";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        if (!$conn) {
                                            die('Technical Error...');
                                        } else {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<div class='card mb-4'>";
                                                echo "
                                                    <div class='card-body text-center'>
                                                        <img src='server/APIs/uploads/profile/".$row["image"]."' alt='avatar' class='rounded-circle img-fluid' style='width: 150px;'>
                                                        <h5 class='my-3'>".$row["full_name"]."</h5>
                                                        <p class='text-muted mb-1'>".$row["job"]."</p>
                                                        <p class='text-muted mb-4'>".$row["address"]."</p>
                                                        <div class='d-flex justify-content-center mb-2'>
                                                            <button type='button' class='btn btn-success btn-rounded'><i class='fas fa-edit'></i> Edit</button>
                                                        </div>
                                                    </div>
                                                ";
                                                echo "</div>";


                                                echo "
                                                <div class='card mb-4 mb-lg-0'>
                                                    <div class='card-body p-0'>
                                                        <ul class='list-group list-group-flush rounded-3'>
                                                            <li class='list-group-item d-flex justify-content-between align-items-center p-3'>
                                                                <i class='fab fa-github fa-lg' style='color: #333333;'></i>
                                                                <p class='mb-0'><a href='".$row["github_link"]."' target='_blank'><button type='button' class='btn btn-secondary btn-sm btn-rounded'><i class='fas fa-external-link-alt'></i> View</button></a></p>
                                                            </li>
                                                            <li class='list-group-item d-flex justify-content-between align-items-center p-3'>
                                                                <i class='fab fa-linkedin fa-lg' style='color: #55acee;'></i>
                                                                <p class='mb-0'><a href='".$row["linkedin_link"]."' target='_blank'><button type='button' class='btn btn-secondary btn-sm btn-rounded'><i class='fas fa-external-link-alt'></i> View</button></a></p>
                                                            </li>
                                                            <li class='list-group-item d-flex justify-content-between align-items-center p-3'>
                                                                <i class='fab fa-instagram fa-lg' style='color: #ac2bac;'></i>
                                                                <p class='mb-0'><a href='".$row["instagram_link"]."' target='_blank'><button type='button' class='btn btn-secondary btn-sm btn-rounded'><i class='fas fa-external-link-alt'></i> View</button></a></p>
                                                            </li>
                                                            <li class='list-group-item d-flex justify-content-between align-items-center p-3'>
                                                                <i class='fab fa-facebook-f fa-lg' style='color: #3b5998;'></i>
                                                                <p class='mb-0'><a href='".$row["facebook_link"]."' target='_blank'><button type='button' class='btn btn-secondary btn-sm btn-rounded'><i class='fas fa-external-link-alt'></i> View</button></a></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                ";


                                            }
                                        }
                                    } else {
                                        echo "<p>No data to show!<p>";
                                    }
                                    ?>


                                    <!--
                                    <div class="card mb-4">
                                        <div class="card-body text-center">
                                            <img src="server/APIs/uploads/profile/profile.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                            <h5 class="my-3">Vimantha Dilshan</h5>
                                            <p class="text-muted mb-1">Software Engineer</p>
                                            <p class="text-muted mb-4">Kuliyapitiya, Sri Lanka</p>
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btn btn-success btn-rounded"><i class="fas fa-edit"></i> Edit</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-4 mb-lg-0">
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush rounded-3">
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                                    <p class="mb-0"><a href=""><button type="button" class="btn btn-secondary btn-sm btn-rounded"><i class="fas fa-external-link-alt"></i> View</button></a></p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                                    <p class="mb-0"><a href=""><button type="button" class="btn btn-secondary btn-sm btn-rounded"><i class="fas fa-external-link-alt"></i> View</button></a></p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                                    <p class="mb-0"><a href=""><button type="button" class="btn btn-secondary btn-sm btn-rounded"><i class="fas fa-external-link-alt"></i> View</button></a></p>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                                    <p class="mb-0"><a href=""><button type="button" class="btn btn-secondary btn-sm btn-rounded"><i class="fas fa-external-link-alt"></i> View</button></a></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>-->
                                </div>

                                <div class="col-lg-8">
                                    
                                    <?php
                                    // Establish the Connection
                                    include 'server/config/database_config.php';

                                    $sql = "SELECT * from profile";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        if (!$conn) {
                                            die('Technical Error...');
                                        } else {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "
                                                <div class='card mb-4'>
                                                <div class='card-body'>
                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Full Name</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["full_name"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Job</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["job"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Email</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["email"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Mobile 01</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["mobile_01"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Mobile 02</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["mobile_02"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Address</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["address"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class='row'>
                                                        <div class='col-sm-3'>
                                                            <p class='mb-0'>Country</p>
                                                        </div>
                                                        <div class='col-sm-9'>
                                                            <p class='text-muted mb-0'>" . $row["country"] . "</p>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                </div>
                                                </div>
                                                ";

                                                echo "
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class='card mb-4 mb-md-0'>
                                                            <div class='card-body'>
                                                                <p class='mb-4'><span class='text-primary font-italic me-1'>Bio</span> Description</p>
                                                                <p class='mb-1' style='font-size: .77rem;'>" . $row["bio"] . "</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";

                                            }
                                        }
                                    } else {
                                        echo "<p>No data to show!<p>";
                                    }
                                    ?>


                                    <!--
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">Vimantha Dilshan</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Job</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">Software Engineer</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">vimantha.0323@gmail.com</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">(+94) 77 872 3616</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Mobile</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">(+94) 77 872 3616</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Address</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">Kuliyapitiya, Sri Lanka</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Country</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">Sri Lanka</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-4 mb-md-0">
                                                <div class="card-body">
                                                    <p class="mb-4"><span class="text-primary font-italic me-1">Bio</span> Description
                                                    </p>
                                                    <p class="mb-1" style="font-size: .77rem;">I am VImantha Dilshan, And I am a super addictive and focused person when comes to 
                                                    software development, whether it may be a web application or a system side application. My passion is collecting experiences 
                                                    for my career by working in different places with a high level of learning.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
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