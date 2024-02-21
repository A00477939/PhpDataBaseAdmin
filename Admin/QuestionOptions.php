<?php
include('connection.php');

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
                        <h4 class="text-center">Quiz Option Details
                        </h4>
                       
                    </div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Option</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Quiz Option</h4>
                            </div>
                            <div class="modal-body">
                            <form action="QuizOptionFunction.php" method="POST">
                            <input type="text" name="option" class="form-control mb-3" placeholder="Add a option">
                            <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" name="save_option" class="btn btn-primary ">Save Option</button>
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
                                    <th>Sr.No</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    $query = "SELECT * FROM QUESTION_OPTIONS";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $option)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo"$i" ?></td>
                                                <td><?= $option['QUESTION_OPTIONS']; ?></td>
                                                <td>
                                                    
                                                    <form action="Quiz.php" method="POST" class="d-inline">
                                                    <a href="QuizOptionUpdate.php?id=<?= $option['OID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    </form>

                                                   <form action="QuizOptionFunction.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_option" value="<?=$option['OID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                            $i=$i+1;
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
