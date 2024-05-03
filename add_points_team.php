<?php 
include("connect.php");

$team_id;
$team = $_GET['team'];
$krit = $_GET['krit'];
$kol = $_GET['kol'];


if ($team == 'Рыси') {
    $team_id = 1;
} else if ($team == 'Барсы') {
    $team_id = 2;
} else if ($team == 'Медведи') {
    $team_id = 3;
} else if ($team == 'Ястребы') {
    $team_id = 4;
}

$sql = "UPDATE груп_рейтинг SET {$krit} = {$krit} + {$kol} WHERE id_группы = $team_id;";
$result = mysqli_query($mysqli, $sql);
header("Location: admin.php");
 

?>