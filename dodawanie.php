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
    if(empty($_SESSION['login'])){
        header("Location: logowanie.php");
    }
    ?>
    <!-- STRONA Główna -->
    <h1>Dodaj zadanie!</h1>
    
    <!-- PRZYCISK WYLOGOWANIA -->
    <button><a href="wylogowanie.php">Wyloguj</a></button>

    <?php
    echo "Użytkownik: ".$_SESSION['login'];
    ?>
    <!-- Formularz dodawania zadania -->
    <form action="task_add_check.php" method="POST">
        <br>
        <label for="task">Zadanie: </label>
        <input id="task" name="task" type="text" required><br><br>
        <label for="deadline">Data ukończenia: </label>
        <input id="deadline" name="deadline" type="date" required><br><br>
        <input id="send" type="submit" value="Dodaj">
    </form>
    
    <br>
    <button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>