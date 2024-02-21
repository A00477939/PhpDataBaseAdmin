<?php
include('connection.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <h4>Quiz Option Edit 
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $option_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM QUESTION_OPTIONS WHERE OID='$option_id' ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $option = mysqli_fetch_array($query_run);
                                ?>
                                <form action="QuizOptionFunction.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $option['OID']; ?>" placeholder="<?= $quiz['id']; ?>">

                                    <div class="mb-3">
                                    <input type="text" name="option" class="form-control mb-3" placeholder="<?= $option['QUESTION_OPTIONS']; ?>" value=<?= $option['QUESTION_OPTIONS']; ?>>
                                    </div>
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_option" class="btn btn-primary">
                                            Update Option
                                        </button>
                                        <a href="QuestionOptions.php" class="btn btn-danger float-end">BACK</a>

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