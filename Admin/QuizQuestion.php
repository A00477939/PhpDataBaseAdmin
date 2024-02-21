<?php
include('connection.php');

?>

<!doctype html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
   
  
    <div class="container mt-4">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Question Details
                        </h4>
                       
                    </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Question</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Question</h4>
                            </div>
                            <div class="modal-body">
                            <form action="QuizQuestionFunction.php" method="POST">
                        
                            <label class="mt-4" for="exampleDropdown">Select Quiz Category:</label>
                            <?php 
                                        $query = "SELECT * FROM QUIZ";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0) {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example" name="category">
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

                            <textarea class="form-control mt-4" placeholder="Write a QUESTIONS?" name="question" id="exampleTextarea" rows="3"></textarea>

                            <label class="mt-4" for="exampleDropdown">Select Answer:</label>
                            <?php 
                                        $query = "SELECT * FROM QUESTION_OPTIONS";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0) {
                                    ?>
                                        <select class="form-select form-select-lg" aria-label=".form-select-sm example" name="option">
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


                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="save_question" class="btn btn-primary mt-4">Save Question</button>
                            </div> 
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                        </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>   
                                    <th>Quiz Category</th>
                                    <th>Question</th>
                                    <th>Answer</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT Q.QUESTION, QU.TITLE, Q.QID,QP.QUESTION_OPTIONS
                                    FROM QUESTIONS Q
                                    LEFT JOIN QUIZ QU ON Q.QUIZID = QU.QUIZID
                                    LEFT JOIN COMPRISE C ON C.QID = Q.QID
                                    LEFT JOIN QUESTION_OPTIONS QP ON QP.OID = C.OID
                                    ;";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $Question)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $Question['TITLE']; ?></td>
                                                <td><?= $Question['QUESTION']; ?></td>
                                                <td><?= $Question['QUESTION_OPTIONS']; ?></td>
                                                <td>
                                                    
                                                    <form action="QuizQuestionUpdate.php" method="POST" class="d-inline">
                                                    <a href="QuizQuestionUpdate.php?id=<?= $Question['QID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    </form>

                                                   <form action="QuizQuestionFunction.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_Question" value="<?=$Question['QID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
