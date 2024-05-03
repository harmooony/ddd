<?php 
include("connect.php");

$login = $_GET['login'];
$krit = $_GET['krit'];
$kol = $_GET['kol'];

$query = mysqli_query($mysqli, "SELECT * FROM курсанты WHERE login = '{$login}'");
$row = mysqli_fetch_assoc($query);
$id = $row['id'];


$sql = "UPDATE инд_рейтинг SET {$krit} = {$krit} + {$kol} WHERE id_курсанта = $id;";
$result = mysqli_query($mysqli, $sql);
header("Location: admin.php")

?>
