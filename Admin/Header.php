<?php
session_start();
include('connection.php');


if (!isset($_SESSION["username"])) {
    header("Location: Login.php");
    exit();
}

$username = $_SESSION["username"];

$name = $_SESSION['FNAME'] ;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="path/to/sweetalert2.min.css">
<script src="path/to/sweetalert2.all.min.js"></script>

    

</head>
<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="Admin.php">Quiz Knowledge</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Page
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=quiz">Quiz</a>
                            <a class="dropdown-item" href="?page=question">Question</a>
                            <a class="dropdown-item" href="?page=option">Option</a>
                            <a class="dropdown-item" href="?page=user">User</a>
                            <a class="dropdown-item" href="?page=UserScore">User Score</a>


                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Analysis
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=AnalysisCountry">Scoreboard</a>
                            <a class="dropdown-item" href="?page=AnalysisUser">CountryWise User Count </a>


                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Raw Data
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=RawQuestion">Question</a>
                            <a class="dropdown-item" href="?page=RawComprised"> Comprise </a>


                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="navbar-text mr-2">
                            Welcome, <?php echo $name; ?>
                        </span>
                    </li>
                    <li class="nav-item">
                            <form method="post" action="Logout.php">
                                <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">Logout</button>
                            </form>

                    </li>
                </ul>
            </div>
        </nav>
</body>
</html>