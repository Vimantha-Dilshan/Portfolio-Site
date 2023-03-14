<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM comments WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Comment deleted!") </script>';
        echo '<script type="text/javascript"> location.href = "../../comments.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete comment") </script>';
        echo '<script type="text/javascript"> location.href = "../../comments.php" </script>';
    }
?>