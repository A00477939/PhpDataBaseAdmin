<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <?php
    include('Header.php');
    ?>
        <div id="content" class="mt-4">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : '';
            switch ($page) {
                case 'quiz':
                    include 'Quiz.php';
                    break;
                case 'question':
                    include 'QuizQuestion.php';
                    break;
                case 'option':
                    include 'QuestionOptions.php';
                    break;
                case 'user':
                    include 'AppUser.php';
                    break;
                case 'UserScore':
                    include 'UserScore.php';
                     break;
                case 'AnalysisCountry':
                    include 'AnalysisCountry.php';
                    break;
                case 'AnalysisUser':
                    include 'AnalysisUser.php'; 
                    break;
                case 'RawComprised':
                        include 'RawComprised.php'; 
                        break;
                case 'RawQuestion':
                        include 'RawQuestion.php'; 
                        break;
                default:
                    echo 'Please select a page from the dropdown.';
            }
            if (isset($_SESSION['error_message'])) {
                echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
                // Clear the error message from the session
                unset($_SESSION['error_message']);
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
