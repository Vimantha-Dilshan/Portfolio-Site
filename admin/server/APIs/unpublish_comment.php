<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $id = $_GET['rn'];
    $approve = 0;


    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {

        $sql = "UPDATE `comments` SET `approve` = '$approve' WHERE `comments`.`id` = $id; ";

        if ($conn->query($sql) === TRUE) {
            // Yes
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Comment unpublished!');
            window.location.href='../../comments.php';
            </script>");
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>