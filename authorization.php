<?php
include ("connect.php");

$login = $_GET['login'];
$password = $_GET['password'];
$hash_password = md5($password);

$sql = "SELECT * FROM курсанты WHERE login='$login' AND password='$hash_password'";
$result = mysqli_query($mysqli, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $isFill = $row['isFill'];

    setcookie("types", "kursant", time() + 3600, "/");
    setcookie("id", $id, time() + 3600, "/");

    if ($isFill == 0) {
        header("Location: fill.php");
    } else if ($isFill == 1) {
        header("Location: profile.php");
    }
} else {
    $sql = "SELECT * FROM админы WHERE login='$login' AND password='$hash_password'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];

        setcookie("id", $id, time() + 3600, "/");
        setcookie("types", "admin", time() + 3600, "/");

        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('Incorrect Login or Password');</script>";
    }
}
?>