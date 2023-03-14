<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $name = $_POST['txtName'];
    $project = $_POST['txtProject'];
    $stars = $_POST['txtStars'];
    $feedback = $_POST['txtFeedback'];
    $approve = 0;

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO comments (name, project, stars, feedback, approve) VALUES(?,?,?,?,?)");
        $stmt->bind_param("ssssi", $name, $project, $stars, $feedback, $approve);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Comment added!');
        window.location.href='../../comments.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>