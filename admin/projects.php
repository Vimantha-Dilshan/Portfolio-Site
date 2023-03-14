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
    <title>Projects</title>
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
                            <a class="nav-link active" href="projects.php">Projects</a>
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
                        <h5 class="card-title">Projects</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
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
                                        <th>Project</th>
                                        <th>Materials</th>
                                        <th>Status</th>
                                        <th>Time (Days)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // Establish the Connection
                                    include 'server/config/database_config.php';

                                    $sql = "SELECT * from projects ORDER BY id DESC";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        if (!$conn) {
                                            die('Technical Error...');
                                        } else {
                                            while ($row = $result->fetch_assoc()) {
                                                // Assign Status Badge Color
                                                $statusCode = "";
                                                if ($row["status"] == "Completed") {
                                                    $statusCode = "badge-success";
                                                } else if ($row["status"] == "Ongoing") {
                                                    $statusCode = "badge-warning";
                                                } else if ($row["status"] == "Upcomming") {
                                                    $statusCode = "badge-danger";
                                                } else {
                                                    $statusCode = "badge-warning";
                                                }

                                                // Calculate remaining days
                                                $datediff = strtotime($row["end_date"]) - strtotime($row["start_date"]);
                                                //$time = strtotime("2022-10-04") - strtotime($row["2022-10-01"]);

                                                $time = round($datediff / (60 * 60 * 24));

                                                echo "<tr>";

                                                echo "<td style='width: 30%;''>";
                                                echo "<div class='d-flex align-items-center'>";
                                                echo "<div class='ms-3'>";
                                                echo "<p class='fw-bold mb-1'>" . $row["title"] . "</p>";
                                                echo "<p class='fw-normal mb-1'><b>" . $row["start_date"] . "</b> | " . $row["end_date"] . "</p>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<a class='btn btn-secondary btn-rounded' target='_blank' href='" . $row["doc_link"] . "' role='button'>
                                                <i class='fab fa-google-drive'></i></a>";
                                                echo "<a class='btn btn-dark btn-rounded text-white' target='_blank' href='" . $row["git_link"] . "' role='button'>
                                                <i class='fab fa-github'></i></a>";
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<span class='badge " . $statusCode . "'>" . $row["status"] . "</span>";
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<div class='d-flex align-items-start'>";
                                                echo "<div class='flex-shrink-0'>";
                                                echo "<div class='p-3 badge-primary rounded-4'>";
                                                echo "<b>" . $time . "</b>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<a href='#'><button type='button' class='btn btn-secondary btn-rounded'><i class='fas fa-info-circle'></i></button></a>";
                                                echo "<a href='#'><button type='button' class='btn btn-success btn-rounded'><i class='fas fa-edit'></i></button></a>";
                                                echo "<a href='server/APIs/delete_project.php?rn=$row[id]'><button type='button' class='btn btn-danger btn-rounded'><i class='fas fa-trash-alt'></i></button></>";
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


                                    <!--
                                    <tr>
                                        <td style="width: 30%;">
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">Online Mobile Inventory</p>
                                                    <p class="fw-normal mb-1">SEP-OCT 2022</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a class="btn btn-secondary btn-rounded" href="#!" role="button">
                                                <i class="fab fa-google-drive"></i>
                                            </a>
                                            <a class="btn btn-dark btn-rounded text-white" href="#!" role="button">
                                                <i class="fab fa-github"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Success</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0">
                                                    <div class="p-3 badge-primary rounded-4">
                                                        <b>00</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-rounded"><i class="fas fa-info-circle"></i></button>
                                            <button type="button" class="btn btn-success btn-rounded"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-rounded"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr> -->


                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer">
                        <small><i class="fas fa-info-circle"></i> All projects are shown here</small>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card  ">
                    <div class="card-header">
                        <h5 class="card-title">Create project</h5>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="server/APIs/store_project.php" enctype="multipart/form-data">
                            <div class="form-outline mb-4">
                                <input type="text" id="txtTitle" name="txtTitle" class="form-control" required />
                                <label class="form-label" for="form6Example3"><i class="fas fa-heading"></i> Title</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input class="form-control" type="file" id="image" name="image" required />
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="text" id="txtClientName" name="txtClientName" class="form-control" required />
                                        <label class="form-label" for="form6Example3"><i class="fas fa-male"></i> Client Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="tel" id="txtContactNo" name="txtContactNo" class="form-control" required />
                                        <label class="form-label" for="form6Example3"><i class="fas fa-phone"></i> Contact Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="text" id="txtDocLink" name="txtDocLink" class="form-control" required />
                                        <label class="form-label" for="form6Example3"><i class="fab fa-google-drive"></i> Documents Link</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="text" id="txtGitLink" name="txtGitLink" class="form-control" required />
                                        <label class="form-label" for="form6Example3"><i class="fab fa-github"></i> Github Link</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="date" id="txtStartDate" name="txtStartDate" class="form-control" required />
                                        <label class="form-label" for="form6Example1"><i class="fas fa-calendar-alt"></i> Start Date</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline">
                                        <input type="date" id="txtEndDate" name="txtEndDate" class="form-control" required />
                                        <label class="form-label" for="form6Example2"><i class="fas fa-calendar-check"></i> End Date</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="txtDesc" name="txtDesc" rows="6" required></textarea>
                                <label class="form-label" for="form6Example7"><i class="fas fa-align-center"></i> Description</label>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInput5" class="form-label"><i class="fas fa-filter"></i> Status</label>
                                <select id="txtStatus" name="txtStatus" class="form-select" aria-label="Default select example" required>
                                    <option class="form-option" value="Choose" selected disabled></option>
                                    <option class="form-option" value="Upcomming">Upcomming</option>
                                    <option class="form-option" value="Ongoing">Ongoing</option>
                                    <option class="form-option" value="Completed">Completed</option>
                                </select>
                            </div>



                            <!-- Submit button -->
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary btn-rounded">Cancel</button>
                                <button type="submit" id="submit" name="submit" class="btn btn-success btn-rounded">Add Project</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted"><small><i class="fas fa-info-circle"></i> If links are null, then enter "#" mark</small></div>
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