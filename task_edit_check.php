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
    <h1>Edytuj zadanie!</h1>
    
    <?php
    echo "Witaj, ".$_SESSION['login']."!";
    ?>
    <!-- Formularz edytowania zadania -->
    <form action="task_edit_send_check.php" method="POST">
        <br>
        <label for="task">Zadanie: </label>
        <input id="task" name="task" type="text" required><br><br>
        <label for="deadline">Hasło: </label>
        <input id="deadline" name="deadline" type="date" required><br><br>
        <input id="send" type="submit" value="Dodaj">
    </form>
    
    <br>
    <button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>