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
    <title>Work Experience</title>
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
                            <a class="nav-link active" href="work.php">Work</a>
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

            <div class="col-sm-8">
                <div class="card  ">
                    <div class="card-header">
                        <h5 class="card-title">Existing Work Experience</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 text-end">
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input id="search-input" type="search" id="form1" class="form-control" />
                                        <label class="form-label" for="form1">Search</label>
                                    </div>
                                    <button id="search-button" type="button" class="btn btn-primary btn-rounded">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0 bg-white table-hover table-sm">
                                <thead class="table-success text-dark">
                                    <tr>
                                        <th>Work Experience</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Establish the Connection
                                    include 'server/config/database_config.php';

                                    $sql = "SELECT * from work ORDER BY id DESC";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        if (!$conn) {
                                            die('Technical Error...');
                                        } else {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";

                                                echo "<td style='width: 75%;'>";
                                                echo "<div class='d-flex align-items-center'>";
                                                echo "<div class='ms-3'>";
                                                echo "<p class='fw-bold mb-1'>" . $row["position"] . "</p>";
                                                echo "<p class='fw-normal mb-1'>" . $row["company"] . "</p>";
                                                echo "<p class='text-muted mb-0'>" . $row["year"] . "</p>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<a href='#'><button type='button' class='btn btn-secondary btn-rounded'><i class='fas fa-info-circle'></i></button></a>";
                                                echo "<a href='#'><button type='button' class='btn btn-success btn-rounded'><i class='fas fa-edit'></i></button></a>";
                                                echo "<a href='server/APIs/delete_work.php?rn=$row[id]><button type='button' class='btn btn-danger btn-rounded'><i class='fas fa-trash-alt'></i></button></>";
                                                echo "</td>";

                                                echo "<tr>";
                                            }
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo "<td colspan='2'>" . "<p>No data to show!<p>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small><i class="fas fa-info-circle"></i> All work experiences are shown here</small>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card  ">
                    <div class="card-header">
                        <h5 class="card-title">Create Work Experience</h5>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="server/APIs/store_work.php">
                            <div class="form-outline mb-4">
                                <input type="text" id="txtPosition" name="txtPosition" class="form-control" />
                                <label class="form-label" for="form6Example3"><i class="fas fa-user-tie"></i> Position</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-8">
                                    <div class="form-outline">
                                        <input type="text" id="txtCompany" name="txtCompany" class="form-control" />
                                        <label class="form-label" for="form6Example1"><i class="fas fa-hotel"></i> Company</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-outline">
                                        <input type="text" id="txtYear" name="txtYear" class="form-control" />
                                        <label class="form-label" for="form6Example2"><i class="far fa-calendar"></i> Year</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="txtDescription" name="txtDescription" rows="17"></textarea>
                                <label class="form-label" for="form6Example7"><i class="fas fa-align-center"></i> Description</label>
                            </div>

                            <!-- Submit button -->
                            <div class="text-end">
                                <a href="server/APIs/refresh_work.php"><button type="button" class="btn btn-secondary btn-rounded">Cancel</button></a>
                                <button type="submit" id="submit" name="submit" class="btn btn-success btn-rounded">Add Experience</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted"><small><i class="fas fa-info-circle"></i> Input range of years in year field</small></div>
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