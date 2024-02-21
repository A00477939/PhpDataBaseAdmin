<?php
include('connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<?php
    include('Header.php');
    ?>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Quiz Edit 
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $quiz_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM QUIZ WHERE QUIZID='$quiz_id' ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $quiz = mysqli_fetch_array($query_run);
                                ?>
                                <form action="QuizFunction.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $quiz['QUIZID']; ?>" placeholder="<?= $quiz['id']; ?>">

                                    <div class="mb-3">
                                    <input type="text" name="title" class="form-control mb-3" placeholder="<?= $quiz['TITLE']; ?>" value=<?= $quiz['TITLE']; ?>>
                                    </div>
                                    <div class="mb-3">
                                    <input type="text" name="description" class="form-control mb-3" placeholder="<?= $quiz['QUIZ_DESCRIPTION']; ?>" value=<?= $quiz['QUIZ_DESCRIPTION']; ?>>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_quiz" class="btn btn-primary">
                                            Update Quiz
                                        </button>
                                        <a href="Admin.php?page=quiz" class="btn btn-danger float-end">BACK</a>

                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>