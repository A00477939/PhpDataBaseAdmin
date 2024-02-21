<?php
include('connection.php');



if(isset($_POST['save_quiz']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $query="INSERT INTO QUIZ (TITLE,QUIZ_DESCRIPTION) VALUES ('$title','$description')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Quiz Added successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=quiz";';
        echo '  }';
        echo '});';
        echo '</script>';
       
      
    }
}



if (isset($_POST['delete_quiz'])) {
    $quiz_id = mysqli_real_escape_string($con, $_POST['delete_quiz']);

    $query = "DELETE FROM QUIZ WHERE QUIZID='$quiz_id' ";
    
    try {
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
            echo '<script>';
            echo 'Swal.fire({';
            echo '  icon: "success",';
            echo '  title: "Success",';
            echo '  text: "Quiz Deleted successfully.",';
            echo '  confirmButtonColor: "#3085d6",';
            echo '  confirmButtonText: "OK"';
            echo '}).then((result) => {';
            echo '  if (result.isConfirmed) {';
            echo '    window.location.href = "Admin.php?page=quiz";';
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
            echo '  text: "Foreign key Constraint.",';
            echo '  confirmButtonColor: "#3085d6",';
            echo '  confirmButtonText: "OK"';
            echo '}).then((result) => {';
            echo '  if (result.isConfirmed) {';
            echo '    window.location.href = "Admin.php?page=quiz";';
            echo '  }';
            echo '});';
            echo '</script>';
        } else {
            echo "Error: Unable to delete quiz.";
        }
    }
}









if(isset($_POST['update_quiz']))
{
    $quiz_id = mysqli_real_escape_string($con, $_POST['id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);


    $query = "UPDATE QUIZ SET TITLE='$title', QUIZ_DESCRIPTION='$description' WHERE QUIZID='$quiz_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Quiz Update successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=quiz";';
        echo '  }';
        echo '});';
        echo '</script>';
    }


}
?>