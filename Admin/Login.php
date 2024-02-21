<?php
include('connection.php');
session_start();

// Check if the session is already set, redirect to Admin.php
if(isset($_SESSION['username'])){
    header("Location: Admin.php");
    exit();
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $query = "SELECT * FROM APP_USER WHERE EMAIL='$username' AND Password='$password' AND Role='Admin'";

    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1){
        $user_data = mysqli_fetch_assoc($query_run);
        
        // Assuming that the column in your database for the user's name is 'FNAME'
        $name = $user_data['FNAME'];

        $_SESSION['username'] = $username;
        $_SESSION['FNAME'] = $name;
        
        header("Location: Admin.php");
        exit();
    } else {
      echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
      echo '<script>';
      echo 'Swal.fire({';
      echo '  icon: "error",';
      echo '  title: "Error",';
      echo '  text: "Incorrect Password or Username.",';
      echo '  confirmButtonColor: "#3085d6",';
      echo '  confirmButtonText: "OK"';
      echo '}).then((result) => {';
      echo '  if (result.isConfirmed) {';
      echo '    window.location.href = "Login.php"';
      echo '  }';
      echo '});';
      echo '</script>';
    }
}
?>


<!doctype html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-u8i0iJqTlBR6Yu4rDldvEdzHbWWo2p1K4PpXZzqG8lQ8RrZ+W62EmaIhFtW5J4l" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-dgftI3K9QhqLMpG8r+Lx1Tqp2mMbbC09JcFgjvWTQ8k97EY8fJmXe5MPiXwFqT8C" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-LFYiR5IUKFmDhddO0Y6gFuJZkYVr13ACoFhId+X2jAYqX6Q/5OOzq5yBYvaSE1sD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="d-flex align-items-center justify-content-center position-absolute top-50 start-50 translate-middle">
<form action="Login.php" method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" name="username" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" name="password"  class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

  

  <!-- Submit button -->
  <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
  

  </div>
</form>
</div>

</body>
