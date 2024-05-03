<?php
include("connect.php");

$login = $_GET['login'];
$team_id;
$team = $_GET['team'];

if ($team == 'Рыси') {
    $team_id = 1;
} else if ($team == 'Барсы') {
    $team_id = 2;
} else if ($team == 'Медведи') {
    $team_id = 3;
} else if ($team == 'Ястребы') {
    $team_id = 4;
}

$query = mysqli_query($mysqli, "SELECT * FROM курсанты WHERE login='{$login}'");

if (mysqli_num_rows($query) > 0) {
    mysqli_query($mysqli, "UPDATE курсанты SET id_группы = {$team_id} WHERE login = '{$login}'");
    header("Location: admin.php");
} else {
    echo ("Ошибка: Данные логин не найден");
}
?>