<?php
include ("connect.php");

$name = $_GET['name'];
$surname = $_GET['surname'];
$achiev = $_GET['achiev'];
$uvlech = $_GET['uvlech'];
$age = $_GET['age'];
$id = $_COOKIE['id'];

$sql = "UPDATE курсанты SET Имя = '{$name}', Фамилия = '{$surname}', Достижения = '{$achiev}', Увлечения = '{$uvlech}', Возраст = '{$age}', isFill = 1 WHERE id = {$id}";
mysqli_query($mysqli, $sql);
header("Location: profile.php");
?>