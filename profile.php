<?php
include ("connect.php");

if ($_COOKIE["types"] == "admin") {
    header("Location: admin.php");
}


$query = mysqli_query($mysqli, "SELECT * FROM курсанты");
$row = mysqli_fetch_assoc($query);
$name = $row['Имя'];
$surname = $row['Фамилия'];
$rating = $row['Инд_рейтинг'];

$query = mysqli_query($mysqli, "SELECT * FROM группы WHERE `id` = 2");
$row = mysqli_fetch_assoc($query);
$team = $row['Название'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Профиль</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="header_wrapper">
                <div class="header_logo">
                    <a href="index.html">
                        <img src="images/logo_1-01.svg" class="logo">
                    </a>
                    <div class="dropdown">
                        <button onclick="dropdown()" class="dropbtn">Команды</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="bears.php">Медведи</a>
                            <a href="ryisi.php">Рыси</a>
                            <a href="barsi.php">Барсы</a>
                            <a href="eagles.php">Орлы</a>
                        </div>
                    </div>
                </div>
                <div class="header_menu">
                    <a>
                        <img src="images/profile_test.png" class="profile_photo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <img src="images/gerb_left.svg" class="left_gerb">
    <img src="images/gerb_right_1.svg" class="right_gerb">

    <main>
        <div class="container">
            <div class="profile_grid">
                <div class="left_grid">
                    <div class="left_grid_element">
                        <img src="images/profile_test.png" class="big_profile_pic">
                        <h1 class="left_grid_content"><?= $name . ' ' . $surname ?></h1>
                        <h1 class="left_grid_content">Команда: <?= $team?></h1>
                        <h2 class="left_grid_content">Рейтинг: <?= $rating?></h2>
                    </div>
                </div>
                <div class="right_grid"
                    style="display: flex; align-items: center; margin-left: 20px; margin-right: 20px">
                    <canvas width="100%" height="70%" id="mychart"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
    <?php
    include ("connect.php");

    $id = $_COOKIE['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM инд_рейтинг WHERE id_курсанта = {$id}");
    $row = mysqli_fetch_assoc($query);
    $data['Разведчик'] = $row['Разведчик'];
    $data['Спасатель'] = $row['Спасатель'];
    $data['Защитник'] = $row['Защитник'];
    $data['Богатырь'] = $row['Богатырь'];
    $data['Мероприятия'] = $row['Мероприятия'];
    $data['Поведение'] = $row['Поведение'];

    $jsonData = json_encode($data);

    ?>

    <script>
        var chartData = <?php echo $jsonData; ?>;

        var ctx = document.getElementById('mychart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Разведчик', 'Спасатель', 'Защитник', 'Богатырь', 'Мероприятия', 'Поведение'],
                datasets: [{
                    label: 'График',
                    data: chartData,
                    backgroundColor: ['olive', 'orange', 'darkgreen', 'blue', 'red', 'white', 'purple'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

    </script>
</body>

</html>