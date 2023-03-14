<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $name = $_POST['txtName'];
    $institute = $_POST['txtInstitute'];
    $year = $_POST['txtYear'];
    $desc = $_POST['txtDesc'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO education (degree_name, institute, year, description) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $institute, $year, $desc);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Education added!');
        window.location.href='../../education.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>