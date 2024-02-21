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
                        <h4 class="text-center"> COUNTRYWISE USER COUNT
                        </h4>
                       
                    </div>
                        <!-- Trigger the modal with a button -->
                        </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                    <th>Country</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "
                                    SELECT US.COUNTRY, COUNT(US.UID) AS TOTAL_SCORE
                                    FROM APP_USER AS US
                                    GROUP BY US.COUNTRY 
                                    ORDER BY TOTAL_SCORE DESC;";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $total)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $total['COUNTRY']; ?></td>
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
