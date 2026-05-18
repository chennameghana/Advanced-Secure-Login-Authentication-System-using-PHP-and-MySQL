<?php

include "config.php";

$message = "";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,email,password)
            VALUES('$username','$email','$password')";

    if(mysqli_query($conn,$sql)){

        $message = "Registration Successful";

    } else {

        $message = "Registration Failed";

    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Register</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

<form method="POST"
class="bg-light p-5 shadow-lg w-50 m-auto">

<h1 class="text-success text-center">

Register

</h1>

<h5 class="text-danger text-center">

<?php echo $message; ?>

</h5>

<div class="mb-3">

<label>Username</label>

<input type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

</div>

<button type="submit"
name="register"
class="btn btn-success w-100">

Register

</button>

</form>

</div>

</body>

</html>