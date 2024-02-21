<?php
include('connection.php');

if(isset($_POST['save_option']))
{
    $option = mysqli_real_escape_string($con, $_POST['option']);
    $query="INSERT INTO QUESTION_OPTIONS (QUESTION_OPTIONS) VALUES ('$option')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
       
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Option Added successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=option";';
        echo '  }';
        echo '});';
        echo '</script>';
    }
}







if (isset($_POST['delete_option'])) {
    $OID = mysqli_real_escape_string($con, $_POST['delete_option']);

    $query = "DELETE FROM QUESTION_OPTIONS WHERE OID='$OID' ";
    
    try {
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>';
            echo 'Swal.fire({';
            echo '  icon: "success",';
            echo '  title: "Success",';
            echo '  text: "Option Deleted successfully.",';
            echo '  confirmButtonColor: "#3085d6",';
            echo '  confirmButtonText: "OK"';
            echo '}).then((result) => {';
            echo '  if (result.isConfirmed) {';
            echo '    window.location.href = "Admin.php?page=option";';
            echo '  }';
            echo '});';
            echo '</script>';
        } else {
            throw new Exception("Query execution failed");
        }
    } catch (Exception $e) {
        $errorInfo = mysqli_error($con);
        if (strpos($errorInfo, 'foreign key constraint') !== false) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>';
            echo 'Swal.fire({';
            echo '  icon: "error",';
            echo '  title: "Error",';
            echo '  text: "Foreign key Constraint exist.",';
            echo '  confirmButtonColor: "#3085d6",';
            echo '  confirmButtonText: "OK"';
            echo '}).then((result) => {';
            echo '  if (result.isConfirmed) {';
            echo '    window.location.href = "Admin.php?page=option";';
            echo '  }';
            echo '});';
            echo '</script>';
        } else {
            echo "Error: Unable to delete quiz.";
        }
    }
}








if(isset($_POST['update_option']))
{
    $OID = mysqli_real_escape_string($con, $_POST['id']);

    $option = mysqli_real_escape_string($con, $_POST['option']);


    $query = "UPDATE QUESTION_OPTIONS SET QUESTION_OPTIONS='$option' WHERE OID ='$OID' ";
    
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Option Edited successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=option";';
        echo '  }';
        echo '});';
        echo '</script>';
    }


}