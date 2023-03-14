<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM education WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Education deleted!") </script>';
        echo '<script type="text/javascript"> location.href = "../../education.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete education") </script>';
        echo '<script type="text/javascript"> location.href = "../../education.php" </script>';
    }
?>