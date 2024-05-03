<?php
include("connect.php");

$login = $_GET['login'];
$password = $_GET['password'];
$hash_password = md5($password);
/*
$team_id;
$team = $_GET['team'];

if ($team == 'Рысь') {
    $team_id = 1;
} else if ($team == 'Барсы') {
    $team_id = 2;
} else if ($team == 'Медведи') {
    $team_id = 3;
}else if ($team == 'Ястребы') {
    $team_id = 4;
}
*/
$query = mysqli_query($mysqli, "SELECT * FROM курсанты WHERE login='{$login}'");

if (mysqli_num_rows($query) == 0) {
    mysqli_query($mysqli, "INSERT INTO курсанты (login, password) VALUES ('{$login}', '{$hash_password}')");
    header("Location: admin.php");
} else {
    echo "<script>alert('Логин уже занят кем-то');</script>";
    header("Location: autorization.html");
}
?>