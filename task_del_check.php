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
    <!-- Ta część kodu odpowiada za usunięcie zadania z bazy danych -->
    <?php
    //$toDelete = $_POST['toDelete']; --> ta zmienna pochodzi ze starej metody usuwania
    $toDelete = $_POST['id'];
    $login = $_SESSION['login'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "DELETE FROM `tasks` WHERE id='".$toDelete."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Usunięto zadanie!";
            header('Location: aplikacja.php');
        } else {
            echo "Nie udało się usunąć zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    ?>
    <br>
    <button><a href="aplikacja.php">Strona główna</a></button>
</body>

</html>