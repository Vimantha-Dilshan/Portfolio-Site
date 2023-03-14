<?php
// Establish the Connection
include 'admin/server/config/database_config.php';

if ($conn->connect_error) {
    die('Connection Error : ' . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Establish the Connection
    include 'admin/server/config/database_config.php';

    $sql = "SELECT * from profile ORDER BY id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if (!$conn) {
            die('Technical Error...');
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<title>" . $row["full_name"] . "</title>";
            }
        }
    } else {
        echo "<title>Portfolio</title>";
    }
    ?>
    <!--<title>Vimantha Dilshan | SE</title>-->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/aos.css">
    <link rel="stylesheet" href="./assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <a class="navbar-brand mx-lg-auto mb-lg-4" href="#">
                <?php
                // Establish the Connection
                include 'admin/server/config/database_config.php';

                $sql = "SELECT * from profile ORDER BY id = 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    if (!$conn) {
                        die('Technical Error...');
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            echo "<span class='h3 fw-bold d-block d-lg-none'>" . $row["full_name"] . "</span>";
                            echo "<img src='admin/server/APIs/uploads/profile/" . $row["image"] . "' class='d-none d-lg-block rounded-circle' alt='Profile Picture'>";
                        }
                    }
                } else {
                    echo "<p>Data is not loaded from database!</p>";
                }
                ?>
                <!--<span class="h3 fw-bold d-block d-lg-none">Vimantha Dilshan</span>
                <img src="./assets/images/person.jpg" class="d-none d-lg-block rounded-circle" alt="">-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#work">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- //NAVBAR -->

    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper">

        <!-- HOME -->
        <section id="home" class="full-height px-lg-5">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <?php
                        // Establish the Connection
                        include 'admin/server/config/database_config.php';

                        $sql = "SELECT * from profile ORDER BY id = 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            if (!$conn) {
                                die('Technical Error...');
                            } else {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<h1 class='display-4 fw-bold' data-aos='fade-up' style='text-transform: uppercase;'>I'M <span class='text-brand'>" . $row["full_name"] . "</span> <br>FROM " . $row["country"] . "</h1>";
                                    echo "<p class='lead mt-2 mb-4' data-aos='fade-up' data-aos-delay='300'>" . $row["bio"] . "</p>";
                                    echo "<div data-aos='fade-up' data-aos-delay='600'>";
                                    echo "<a href='#work' class='btn btn-brand me-3'>Explore My Work</a>";
                                    echo "<a href='#' class='link-custom'>Contact: " . $row["mobile_01"] . "</a>";
                                    echo "</div>";
                                }
                            }
                        } else {
                            echo "<p>Data is not loaded from database!</p>";
                        }
                        ?>

                        <!--
                        <h1 class="display-4 fw-bold" data-aos="fade-up">I'M A <span class="text-brand">VIMANTHA
                                DILSHAN</span> <br>FROM SRI LANKA</h1>
                        <p class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="300">I am VImantha Dilshan, And I
                            am a super addictive and focused person
                            when comes to software development, whether it may be a web application or a system side
                            application. My passion is collecting experiences
                            for my career by working in different places with a high level of learning.</p>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <a href="#work" class="btn btn-brand me-3">Explore My Work</a>
                            <a href="#" class="link-custom">Contact: (+94) 77 872 3616</a>
                        </div> -->

                    </div>
                </div>
            </div>

        </section>
        <!-- //HOME -->

        <!-- SERVICES -->
        <section id="services" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">SERVICES</h6>
                        <h1>Services That I Provide</h1>
                    </div>
                </div>

                <div class="row gy-4">
                    <?php
                    // Establish the Connection
                    include 'admin/server/config/database_config.php';

                    $sql = "SELECT * from services";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        if (!$conn) {
                            die('Technical Error...');
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col-md-4' data-aos='fade-up'>";
                                echo "<div class='service p-4 bg-base rounded-4 shadow-effect'>";
                                echo "<div class='iconbox rounded-4'>";
                                echo "<i class='" . $row["icon_text"] . "'></i>";
                                echo "</div>";
                                echo "<h5 class='mt-4 mb-2'>" . $row["title"] . "</h5>";
                                echo "<p>" . $row["sub_text"] . "</p>";
                                echo "<a href='#' class='link-custom'>Read More</a>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    } else {
                        echo "<p>Data is not loaded from database!</p>";
                    }
                    ?>

                    <!--
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="service p-4 bg-base rounded-4 shadow-effect">
                            <div class="iconbox rounded-4">
                                <i class="las la-feather"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Website Development</h5>
                            <p>Design, redesign and continuously support customer-facing and enterprise web apps to
                                achieve high conversion and adoption rates.</p>
                            <a href="#" class="link-custom">Read More</a>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service p-4 bg-base rounded-4 shadow-effect">
                            <div class="iconbox rounded-4">
                                <i class="las la-pencil-ruler"></i>
                            </div>
                            <h5 class="mt-4 mb-2">POS System Development</h5>
                            <p>point-of-sale solution at both small and larger businesses with hooks to enterprise-class
                                back-ends and a wide variety of hardware options.</p>
                            <a href="#" class="link-custom">Read More</a>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="service p-4 bg-base rounded-4 shadow-effect">
                            <div class="iconbox rounded-4">
                                <i class="las la-laptop-code"></i>
                            </div>
                            <h5 class="mt-4 mb-2">Business Branding/Social Media</h5>
                            <p>Branding services approaches from numerous angles, helping businesses establish, maintain
                                or expand their brand in every possible way.</p>
                            <a href="#" class="link-custom">Read More</a>
                        </div>
                    </div>  -->

                </div>

            </div>
        </section>
        <!-- SERVICES -->

        <!-- WORK -->
        <section id="work" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">WORK</h6>
                        <h1>My Projects</h1>
                    </div>
                </div>

                <div class="row gy-4">

                    <?php
                    // Establish the Connection
                    include 'admin/server/config/database_config.php';

                    $sql = "SELECT * from projects WHERE status='Completed' ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        if (!$conn) {
                            die('Technical Error...');
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col-md-6' data-aos='fade-up'>";
                                echo "<div class='card-custom rounded-4 bg-base shadow-effect'>";
                                echo "<div class='card-custom-image rounded-4'>";
                                echo "<img class='rounded-4' src='admin/server/APIs/uploads/projects/" . $row["image"] . "' alt='Thumbnail'>";
                                echo "</div>";
                                echo "<div class='card-custom-content p-4'>";
                                echo "<h4>" . $row["title"] . "</h4>";
                                echo "<p>" . $row["description"] . "</p>";
                                echo "<a href='" . $row["git_link"] . "' class='link-custom'>Read More</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    } else {
                        echo "<p>No data to show!</p>";
                    }
                    ?>

                    <!--<div class="col-md-6" data-aos="fade-up">
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="./assets/images/project-1.jpg" alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <h4>Startup Landing Page</h4>
                                <p>Innovation that exceeds expectations. Astra is a true template equiqed with all the
                                    elements you could ever need to put together</p>
                                <a href="#" class="link-custom">Read More</a>
                            </div>
                        </div>
                    </div>-->




                </div>

            </div>
        </section>
        <!-- //WORK -->

        <!-- ABOUT -->
        <section id="about" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">ABOUT</h6>
                        <h1>My Education & Experiance</h1>
                    </div>
                </div>

                <div class="row gy-5">
                    <div class="col-lg-6">

                        <h3 class="mb-4" data-aos="fade-up" data-aos-delay="300">Education</h3>
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="600">

                            <?php
                            // Establish the Connection
                            include 'admin/server/config/database_config.php';

                            $sql = "SELECT * FROM education ORDER BY id DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                if (!$conn) {
                                    die('Technical Error...');
                                } else {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div class='col-12'>";
                                        echo "<div class='bg-base p-4 rounded-4 shadow-effect'>";
                                        echo "<h6>" . $row["degree_name"] . "</h6>";
                                        echo "<p class='text-brand mb-2'>" . $row["institute"] . " - (" . $row["year"] . ")</p>";
                                        echo "<p class='mb-0'>" . $row["description"] . "</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                            } else {
                                echo "<p>Data is not loaded from database!</p>";
                            }
                            ?>

                            <!--<div class="col-12">
                                <div class="bg-base p-4 rounded-4 shadow-effect">
                                    <h6>Bachelor's Degree in Computer Science & Software Engineering</h6>
                                    <p class="text-brand mb-2">University of Bedfordshire (2020 - 2022)</p>
                                    <p class="mb-0">All we are more and design lorem ipsum dolor creativity sit amet
                                        consectetur adipisicing elit</p>
                                </div>
                            </div>-->

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <h3 class="mb-4" data-aos="fade-up" data-aos-delay="300">Experiance</h3>
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="600">

                            <?php
                            // Establish the Connection
                            include 'admin/server/config/database_config.php';

                            $sql = "SELECT * FROM work ORDER BY id DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                if (!$conn) {
                                    die('Technical Error...');
                                } else {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<div class='col-12'>";
                                        echo "<div class='bg-base p-4 rounded-4 shadow-effect'>";
                                        echo "<h6>" . $row["position"] . "</h6>";
                                        echo "<p class='text-brand mb-2'>" . $row["company"] . " - (" . $row["year"] . ")</p>";
                                        echo "<p class='mb-0'>" . $row["description"] . "</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                            } else {
                                echo "<p>Data is not loaded from database!</p>";
                            }
                            ?>

                            <!--<div class="col-12">
                                <div class="bg-base p-4 rounded-4 shadow-effect">
                                    <h6>As Trainee Software Engineer</h6>
                                    <p class="text-brand mb-2">Arimac, Sri Lanka (2022)</p>
                                    <p class="mb-0">Worked on RESTful API development in server-side PHP and laravel
                                        lumen environment.</p>
                                </div>
                            </div>-->


                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- //ABOUT -->

        <!-- REVIEWS -->
        <section id="reviews" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">REVIEWS</h6>
                        <h1>What my subscribers say"</h1>
                    </div>
                </div>

                <div class="row gy-4">

                    <?php
                    // Establish the Connection
                    include 'admin/server/config/database_config.php';

                    $sql = "SELECT * FROM comments WHERE approve=1 ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        if (!$conn) {
                            die('Technical Error...');
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                $ratedStars = $row["stars"];
                                $remainingStars = 5 - $row["stars"];

                                echo "<div class='col-md-4' data-aos='fade-up'>";
                                echo "<div class='review shadow-effect bg-base p-4 rounded-4'>";
                                echo "<div class='text-brand h5'>";
                                for ($x = 1; $x <= $ratedStars; $x++) {
                                    echo "<i class='las la-star'></i>";
                                }
                                echo "</div>";
                                echo "<p class='my-3'>" . $row["feedback"] . "</p>";
                                echo "<div class='person'>";
                                echo "<h5 class='mb-0'>" . $row["name"] . "</h5>";
                                echo "<p class='mb-0'>" . $row["project"] . "</p>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    } else {
                        echo "<p>Data is not loaded from database!</p>";
                    }
                    ?>

                    <!--<div class="col-md-4" data-aos="fade-up">
                        <div class="review shadow-effect bg-base p-4 rounded-4">
                            <div class="text-brand h5">
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                                <i class="las la-star"></i>
                            </div>
                            <p class="my-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel quae facilis
                                fugiat molestias ab illum excepturi, qui optio modi asperiores, delectus maiores!</p>
                            <div class="person">
                                <h5 class="mb-0">Jon Doe</h5>
                                <p class="mb-0">Twitter</p>
                            </div>
                        </div>
                    </div>-->

                </div>

            </div>
        </section>
        <!-- //REVIEWS -->

        <!-- BLOG -->
        <section id="blog" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4" data-aos="fade-up">
                    <div class="col-lg-8">
                        <h6 class="text-brand">BLOG</h6>
                        <h1>My BLog Posts</h1>
                    </div>
                </div>

                <div class="row gy-4">

                    <div class="col-md-4" data-aos="fade-up">
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="./assets/images/blog-post-1.jpg" alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <p class="text-brand mb-2">20 Dec, 2022</p>
                                <h5 class="mb-4">Design a creative landing page using Bootstrap 5</h5>
                                <a href="#" class="link-custom">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="./assets/images/blog-post-2.jpg" alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <p class="text-brand mb-2">20 Dec, 2022</p>
                                <h5 class="mb-4">Design a creative landing page using Bootstrap 5</h5>
                                <a href="#" class="link-custom">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-custom rounded-4 bg-base shadow-effect">
                            <div class="card-custom-image rounded-4">
                                <img class="rounded-4" src="./assets/images/blog-post-3.jpg" alt="">
                            </div>
                            <div class="card-custom-content p-4">
                                <p class="text-brand mb-2">20 Dec, 2022</p>
                                <h5 class="mb-4">Design a creative landing page using Bootstrap 5</h5>
                                <a href="#" class="link-custom">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- //BLOG -->

        <!-- CONTACT -->
        <section id="contact" class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 pb-4" data-aos="fade-up">
                        <h6 class="text-brand">CONTACT</h6>
                        <h1>Need any software or website solution? <br>Let's talk
                            <p class="reply-text" style="font-size: 20px; color:aqua">I will contact you with a reply soon as possible!</p>
                        </h1>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="300">
                        <form method="POST" action="#" class="row g-lg-3 gy-3">
                            <div class="form-group col-md-6">
                                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group col-12">
                                <input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="Enter subject">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="" name="txtMessage" id="txtMessage" rows="4" class="form-control" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="form-group col-12 d-grid">
                                <button type="submit" name="submit" id="submit" class="btn btn-brand">Contact me</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </section>
        <!-- //CONTACT -->

        <!-- FOOTER -->
        <footer class="py-5 px-lg-5">
            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-auto">
                        <p class="mb-0">
                            <?php
                            // Establish the Connection
                            include 'admin/server/config/database_config.php';

                            $sql = "SELECT * from profile ORDER BY id = 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                if (!$conn) {
                                    die('Technical Error...');
                                } else {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "Designed by <a href='admin/home.php' target='_blank' class='fw-bold' style='text-transform: uppercase;'>" . $row["full_name"] . "</a>";
                                    }
                                }
                            } else {
                                echo "<p>Data is not loaded from database!</p>";
                            }
                            ?>
                            <!--Designed by <a href="admin/home.php" target="_blank" class="fw-bold">VIMANTHA DILSHAN</a>-->
                        </p>
                    </div>
                    <div class="col-auto">
                        <div class="social-icons">
                            <?php
                            // Establish the Connection
                            include 'admin/server/config/database_config.php';

                            $sql = "SELECT * from profile ORDER BY id = 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                if (!$conn) {
                                    die('Technical Error...');
                                } else {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<a href='" . $row["linkedin_link"] . "'><i class='lab la-linkedin'></i></a>";
                                        echo "<a href='" . $row["instagram_link"] . "'><i class='lab la-instagram'></i></a>";
                                        echo "<a href='" . $row["facebook_link"] . "'><i class='lab la-facebook'></i></a>";
                                        echo "<a href='" . $row["github_link"] . "'><i class='lab la-github'></i></a>";
                                    }
                                }
                            } else {
                                echo "<a href='#'><i class='lab la-twitter'></i></a>";
                                echo "<a href='#'><i class='lab la-instagram'></i></a>";
                                echo "<a href='#'><i class='lab la-facebook'></i></a>";
                                echo "<a href='#'><i class='lab la-github'></i></a>";
                            }
                            ?>

                            <!--<a href="#"><i class="lab la-twitter"></i></a>
                            <a href="#"><i class="lab la-instagram"></i></a>
                            <a href="#"><i class="lab la-facebook"></i></a>
                            <a href="#"><i class="lab la-github"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //FOOTER -->

    </div>
    <!-- //CONTENT WRAPPER -->



    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/aos.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>