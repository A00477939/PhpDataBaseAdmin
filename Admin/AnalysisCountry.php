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
                        <h4 class="text-center">Scoreboard (TOP 3)
                        </h4>
                       
                    </div>
                        <!-- Trigger the modal with a button -->
                        </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                    <th>Name</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "
                                    SELECT US.FNAME, SUM(A.SCORE) AS TOTAL_SCORE
                                    FROM APP_USER AS US
                                    LEFT JOIN ATTEMPTS AS A ON US.UID = A.UID
                                    GROUP BY US.UID 
                                    ORDER BY TOTAL_SCORE DESC LIMIT 3;";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $total)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $total['FNAME']; ?></td>
                                                <td><?= $total['TOTAL_SCORE']; ?></td>
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
