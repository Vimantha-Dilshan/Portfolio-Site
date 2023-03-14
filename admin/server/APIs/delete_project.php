<?php
// Establish the Connection
include '../config/database_config.php';

error_reporting(0);

$id = $_GET['rn'];


$querySelect = "select * from projects where id = '$id'";
$ResultSelectStmt = mysqli_query($conn, $querySelect);
$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

$fetchImgTitleName = $fetchRecords['image'];

$createDeletePath = "uploads/projects/" . $fetchImgTitleName;

if (unlink($createDeletePath)) {
    $liveSqlQQ = "delete from projects where id = '$id'";
    $rsDelete = mysqli_query($conn, $liveSqlQQ);

    if ($rsDelete) {
        header('location:../../projects.php?success=true');
        exit();
    }
} else {
    $displayErrMessage = "Unable to delete Project";
}

?>