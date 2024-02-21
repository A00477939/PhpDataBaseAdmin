<?php
include('connection.php');

// First Query
if(isset($_POST['save_question']))
{
    $Category = mysqli_real_escape_string($con, $_POST['category']);
    $Question = mysqli_real_escape_string($con, $_POST['question']);
    $Ans = mysqli_real_escape_string($con, $_POST['option']);
    $query = "INSERT INTO QUESTIONS (QUESTION, QUIZID) VALUES ('$Question', '$Category')";
    $query_run = mysqli_query($con, $query);
    $bridge = mysqli_insert_id($con);

    // Second Query
    if($query_run)
    {
        $secound_query = "INSERT INTO COMPRISE (QID, OID) VALUES ('$bridge', '$Ans')";
        $query_run = mysqli_query($con, $secound_query);

        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Question Added successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=question";';
        echo '  }';
        echo '});';
        echo '</script>';

        exit(0);
    }
}

if(isset($_POST['delete_Question']))
{
    $OID = mysqli_real_escape_string($con, $_POST['delete_Question']);
    $secound_query = "DELETE FROM COMPRISE WHERE QID='$OID' ";
    $query_run = mysqli_query($con, $secound_query);
    $query = "DELETE FROM QUESTIONS WHERE QID='$OID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Question Deleted successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=question";';
        echo '  }';
        echo '});';
        echo '</script>';
        exit(0);
    }
   
}

if(isset($_POST['update_Question'])) {
    $Category = mysqli_real_escape_string($con, $_POST['category']);
    $Question = mysqli_real_escape_string($con, $_POST['question']);
    $Ans = mysqli_real_escape_string($con, $_POST['option']);
    $Qid = mysqli_real_escape_string($con, $_POST['Qid']);
    $Oid = mysqli_real_escape_string($con, $_POST['Oid']);

    $query = "UPDATE QUESTIONS Q
              LEFT JOIN QUIZ QU ON Q.QUIZID = QU.QUIZID
              LEFT JOIN COMPRISE C ON C.QID = Q.QID
              SET Q.QUESTION = ?, Q.QUIZID = ?, C.OID = ?
              WHERE Q.QID = ?";

    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, "ssis", $Question, $Category, $Ans, $Qid);

    $query_run = mysqli_stmt_execute($stmt);

    if ($query_run) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  icon: "success",';
        echo '  title: "Success",';
        echo '  text: "Question Edited successfully.",';
        echo '  confirmButtonColor: "#3085d6",';
        echo '  confirmButtonText: "OK"';
        echo '}).then((result) => {';
        echo '  if (result.isConfirmed) {';
        echo '    window.location.href = "Admin.php?page=question";';
        echo '  }';
        echo '});';
        echo '</script>';
        exit(0);
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

?>
