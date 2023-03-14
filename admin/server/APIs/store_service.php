<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $title = $_POST['txtTitle'];
    $iconText = $_POST['txtIconText'];
    $subText = $_POST['txtSubText'];
    $description = $_POST['txtDescription'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO services (title, icon_text, sub_text, description) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $title, $iconText, $subText, $description);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Service added!');
        window.location.href='../../services.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>