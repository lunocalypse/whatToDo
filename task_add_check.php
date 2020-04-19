<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WhatToDo</title>
</head>

<body>
    <!-- Ta część kodu odpowiada za dodanie zadania do bazy danych -->
    <?php
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    $login = $_SESSION['login'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "INSERT INTO `tasks`(`login`, `task`, `deadline`) VALUES ('".$login."','".$task."','".$deadline."')";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Dodano nowe zadanie!";
        } else {
            echo "Nie udało się dodać nowego zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    ?>
    <br>
    <button><a href="dodawanie.php">Dodaj ponownie</a></button>
    <button><a href="aplikacja.php">Strona główna</a></button>
</body>

</html>