<?php

if ($_COOKIE["types"] == "kursant") {
    header("Location: profile.php");
} else if($_COOKIE["types"] != "kursant" && $_COOKIE["types"] != "admin") {
   header("Location: authorization.html"); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Русичи</title>

    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

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
                            <a href="eagles.php">Ястребы</a>
                        </div>
                    </div>
                </div>
                <div class="header_menu">
                    <a href="admin.php">
                        <img src="images/profile_test.png" class="profile_photo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <img src="images/gerb_left.svg" class="left_gerb">
    <img src="images/gerb_right_1.svg" class="right_gerb">
    
    <main>
        <datalist id="login">
            <?php
                include ("connect.php");
                
                $query = mysqli_query($mysqli, "SELECT login FROM курсанты");
                $row = mysqli_fetch_all($query);
                echo 123 . $row;
                 foreach ($row as $item) {
                     ?>
                     <option> <?= $item[0] ?></option>
            <? } ?>
        </datalist>
        <div class="container">
            <div class="profile_grid">
                <div class="left_grid">
                    <div class="left_grid_element">
                        <img src="images/profile_test.png" class="big_profile_pic">
                        <h1 class="left_grid_content">Admin</h1>
                    </div>
                </div>
                <div class="right_grid">
                    <form action="add_points_team.php" class="form_container">
                        <h1>Команда</h1>
                        <h1>Название команды</h1>
                        <input name="team" type="text" placeholder="Команда" class="adm_inp" list="teams">
                        <h1>Наименование критерия</h1>
                        <input name="krit" type="text" placeholder="Разведчик" class="adm_inp"
                            list="kriterii_grup">
                        <datalist id="kriterii_grup">
                            <option>Разведчики</option>
                            <option>Спасатели</option>
                            <option>Защитники</option>
                            <option>Богатыри</option>
                            <option>Мероприятия</option>
                            <option>Чистота</option>
                            <option>Поведение</option>
                        </datalist>
                        <h1>Начисление баллов</h1>
                        <input name="kol" id="test" type="number" max="10" min="1" placeholder="+1" class="adm_inp">
                        <input type="submit" class="confirm_points" value="Начислить"></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="add_points_ind.php" class="create_add_container">
                <h1>Курсант</h1>
                <h1>Логин</h1>
                <input type="text" id="login" name="login" placeholder="cursant123" class="adm_inp" list="login">
                <h1>Наименование критерия</h1>
                        <input name="krit" type="text" placeholder="Разведчик" class="adm_inp"
                            list="kriterii_ind">
                        <datalist id="kriterii_ind">
                            <option>Разведчик</option>
                            <option>Спасатель</option>
                            <option>Защитник</option>
                            <option>Богатырь</option>
                            <option>Мероприятия</option>
                            <option>Поведение</option>
                        </datalist>
                <h1>Начисление баллов</h1>
                <input name="kol" id="test" type="number" max="10" min="1" placeholder="+1" class="adm_inp">

                <input type="submit" value="Создать" class="confirm_create">
            </form>
        </div>
        <div class="container">
            <form action="registration.php" class="create_add_container">
                <h1>Логин</h1>
                <input type="text" id="login" name="login" placeholder="cursant123" class="adm_inp" list="login">
                <h1>Пароль</h1>
                <input type="text" id="password" name="password" placeholder="password123" class="adm_inp">

                <input type="submit" onclick="add_acc()" value="Создать" class="confirm_create">
            </form>
        </div>
        <div class="container">
            <form action="add_team.php" class="create_add_container">
                <h1>Логин</h1>
                <input type="text" name="login" placeholder="cursant123" class="adm_inp" list="login">
                <h1>Команда</h1>
                <input type="text" name="team" placeholder="Медведи" class="adm_inp" list="teams">
                <datalist id="teams">
                    <option>Медведи</option>
                    <option>Рыси</option>
                    <option>Барсы</option>
                    <option>Ястребы</option>
                </datalist>
                <input type="submit" value="Добавить" class="confirm_create">
            </form>
        </div>
        
    </main>
    <script>
        function change_komu() {
            console.log(123);
            var inp = document.getElementById('test');
            if (inp.value == "Чистота") {
                inp.max = 3;
            }
        }
    </script>
    <script src="script.js"></script>

</body>

</html>