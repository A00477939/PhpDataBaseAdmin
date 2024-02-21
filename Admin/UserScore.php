<?php
include('connection.php');
session_start();


?>

<!doctype html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">User Score
                        </h4>
                       
                    </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" disabled>Add User Score</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add User Score</h4>
                            </div>
                            <div class="modal-body">
                            <form action="QuizFunction.php" method="POST">
                            <input type="text" name="title" class="form-control mb-3" placeholder="Add a title">
                            <input type="text" name="description" class="form-control mb-3" placeholder="Add a Discription">
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="save_quiz" class="btn btn-primary "></button>
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
                                    <th>User Nmae</th>
                                    <th>Quiz Category</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT U.FNAME,A.QUIZID,A.SCORE
                                    FROM ATTEMPTS A
                                    INNER JOIN APP_USER U ON U.UID = A.UID";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $quiz)
                                        {
                                            

                                            ?>
                                            <tr>
                                                <td><?= $quiz['FNAME']; ?></td>
                                                <td><?= $quiz['QUIZID']; ?></td>
                                                <td><?= $quiz['SCORE']; ?></td>
                                                <td>
                                                    
                                                    <form action="Quiz.php" method="POST" class="d-inline">
                                                    <a href="" class="btn btn-success btn-sm disabled"disabled>Edit</a>
                                                    </form>

                                                   <form action="QuizFunction.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_quiz" value="" class="btn btn-danger btn-sm disabled"disabled>Delete</button>
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
