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
                        <h4>Quiz Question Edit 
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $question_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT Q.QUESTION, QU.TITLE, Q.QID,QP.QUESTION_OPTIONS,QU.QUIZID,QP.OID
                            FROM QUESTIONS Q
                            LEFT JOIN QUIZ QU ON Q.QUIZID = QU.QUIZID
                            LEFT JOIN COMPRISE C ON C.QID = Q.QID
                            LEFT JOIN QUESTION_OPTIONS QP ON QP.OID = C.OID
                            ;";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $question = mysqli_fetch_array($query_run);
                                ?>
                                <form action="QuizQuestionFunction.php" method="POST">
                                <label class="mt-4" for="exampleDropdown">Select Quiz Category:</label>

                                    <!-- START -->
                                    <?php 
                                        $query = "SELECT * FROM QUIZ";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0) {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example" name="category">
                                        <option value="<?= $question['QUIZID']; ?>" selected><?= $question['TITLE']; ?></option>

                                            <?php
                                            foreach($query_run as $quiz) {
                                            ?>
                                                <option value="<?= $quiz['QUIZID']; ?>" name="category"><?= $quiz['TITLE']; ?></option>
                                          
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        } else {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example">
                                            <option value="option1">No category available</option>
                                        </select>
                                    <?php
                                        }
                                ?>
                                <!--  -->
                            <textarea class="form-control mt-4" placeholder="" name="question" id="exampleTextarea" rows="3"><?= $question['QUESTION']; ?></textarea>
                                            <!--  -->
                            <label class="mt-4" for="exampleDropdown">Select Answer:</label>
                            <?php 
                                        $query = "SELECT * FROM QUESTION_OPTIONS";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0) {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example" name="option">
                                        <option value="<?= $question['OID']; ?>" selected><?= $question['QUESTION_OPTIONS']; ?></option>
                                            <?php
                                        foreach($query_run as $option){
                                        ?>
                                                <option value="<?= $option['OID']; ?>" name="option"><?= $option['QUESTION_OPTIONS']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                        } else {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example">
                                            <option value="option1">No option available</option>
                                        </select>
                                    <?php
                                        }
                                ?>
                                    <!-- STOP -->
                                    <input type="hidden" name="Qid" value="<?= $question['QID']; ?>" placeholder="<?= $quiz['id']; ?>">
                                    <input type="hidden" name="Oid" value="<?= $question['OID']; ?>" placeholder="<?= $quiz['id']; ?>">


                                
                                    <div class="mb-3 p-5">
                                        <button type="submit" name="update_Question" class="btn btn-primary">
                                            Update Question
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