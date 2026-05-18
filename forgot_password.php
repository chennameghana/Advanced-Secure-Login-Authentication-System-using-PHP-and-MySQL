<?php

include "config.php";

$message = "";

if(isset($_POST['reset'])){

    $email = $_POST['email'];

    $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$newpassword' WHERE email='$email'";

    if(mysqli_query($conn,$sql)){

        $message = "PASSWORD UPDATED SUCCESSFULLY";

    } else {

        $message = "EMAIL NOT FOUND";

    }

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Forgot Password</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body style="background:#f2f2f2;">

<div class="container mt-5">

<div class="bg-white p-5 shadow-lg w-50 m-auto rounded">

<h1 class="text-warning text-center mb-4">

FORGOT PASSWORD

</h1>

<h4 class="text-center text-success mb-4">

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

<label>New Password</label>

<input type="password"
name="newpassword"
class="form-control"
required>

</div>

<button type="submit"
name="reset"
class="btn btn-warning w-100">

Reset Password

</button>

</form>

</div>

</div>

</body>

</html>