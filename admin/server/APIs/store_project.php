<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $title = $_POST['txtTitle'];
    $image = $_FILES['image']['name'];
    $clientName = $_POST['txtClientName'];
    $contactNo = $_POST['txtContactNo'];
    $docLink = $_POST['txtDocLink'];
    $gitLink = $_POST['txtGitLink'];
    $startDate = $_POST['txtStartDate'];
    $endDate = $_POST['txtEndDate'];
    $desc = $_POST['txtDesc'];
    $status = $_POST['txtStatus'];


    // Initialize alert message variable
    $msg = "";

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $newfilename = date("Ymdhis").".".$extension;

        // image file directory
  	    //$target = "images/banners/".basename($image);
        $target = "uploads/projects/".$newfilename;
        
        $stmt = $conn->prepare("INSERT INTO projects (title, image, client_name, contact_no, doc_link, git_link, start_date, end_date, description, status) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss",$title, $newfilename, $clientName, $contactNo, $docLink, $gitLink, $startDate, $endDate, $desc, $status);
        $stmt->execute();

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Project Added!";
        }else{
            $msg = "Failed add project";
        }

        echo ("<script LANGUAGE='JavaScript'>
        window.alert('".$msg."');
        window.location.href='../../projects.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>
