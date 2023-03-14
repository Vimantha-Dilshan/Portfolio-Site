<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM services WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Service deleted!") </script>';
        echo '<script type="text/javascript"> location.href = "../../services.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete service") </script>';
        echo '<script type="text/javascript"> location.href = "../../services.php" </script>';
    }
?>