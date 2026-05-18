
<?php

session_start();

include "config.php";

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){

           $_SESSION['user'] = $row['username'];

            header("location: dashboard.php");

        } else {

            $message = "WRONG PASSWORD";

        }

    } else {

        $message = "USER NOT FOUND";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Login Page</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body style="background:#f2f2f2;">

<div class="container mt-5">

<div class="bg-white p-5 shadow-lg w-50 m-auto rounded">

<h1 class="text-primary text-center mb-4">

LOGIN PAGE

</h1>

<h4 class="text-center text-danger mb-4">

<?php echo $message; ?>

</h4>

<form method="POST">

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
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</div>

</body>

</html>