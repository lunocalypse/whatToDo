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
    <?php
    $toDelete = $_POST['toDelete'];
    $login = $_SESSION['login'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "DELETE FROM `tasks` WHERE id='".$toDelete."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Usunięto zadanie!";
        } else {
            echo "Nie udało się usunąć zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    $_POST = array();
    ?>
    <br>
    <button><a href="usuwanie.php">Usuń ponownie</a></button>
    <button><a href="aplikacja.php">Strona główna</a></button>
</body>

</html>