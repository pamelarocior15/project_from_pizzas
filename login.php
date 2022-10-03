<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include_once "config_login.php";

$usr = $_POST['username'];
$pass = $_POST['password'];
$hashed_pass = hash('sha256', $pass);

// echo $hashed_pass

include_once("db.php");
$link = new Db();

$sql = "SELECT * FROM users WHERE (username=:usr or email=:usr) AND (password=:hashed_pass) and (active='si')";

$stmt = $link->prepare($sql);
$stmt->bindValue(':usr', $usr);
$stmt->bindValue(':hashed_pass', $hashed_pass);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row == 0) {
?>
    <div class="alert alert-danger">
        <a href="login.html" class="close" data-dismiss="alert"> </a>
        <div class="text-center">
            <h5> <strong> ¡ERROR! </strong> LOGIN INVALIDO </h5>
        </div>
    </div>
<?php
} else {
    session_start();
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $_SESSION['time'] = date('H:i:s');
    $_SESSION['username'] = $usr;
    $_SESSION['logueado'] = true;
    header('location:welcome.php');
    echo "Bienvenido";
}
?>