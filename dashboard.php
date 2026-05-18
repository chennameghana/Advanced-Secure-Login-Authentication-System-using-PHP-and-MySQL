<?php

session_start();

if(!isset($_SESSION['user'])){

    header("location: login.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>User Dashboard</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body style="background:#f2f2f2;">

<div class="container mt-5">

<div class="card shadow-lg p-5">

<h1 class="text-success text-center">

WELCOME

</h1>

<h3 class="text-center mt-3">

<?php echo $_SESSION['user']; ?>

</h3>

<hr>

<div class="text-center mt-4">

<a href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</div>

</div>

</body>

</html>