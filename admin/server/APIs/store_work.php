<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $position = $_POST['txtPosition'];
    $company = $_POST['txtCompany'];
    $year = $_POST['txtYear'];
    $desc = $_POST['txtDescription'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO work (position, company, year, description) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $position, $company, $year , $desc);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Work added!');
        window.location.href='../../work.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>