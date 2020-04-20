<?php
    session_start();
    include 'functions.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WhatToDo</title>
</head>

<body>
<?php
    isLogged();
?>
    <!-- STRONA Główna -->
    <h1>Edytuj zadanie!</h1>
    
<?php
    echo "Użytkownik: ".$_SESSION['login'];
?>
<br><br>
<!-- Formularz edytowania zadania -->
<?php
    editForm();    
?>

<br>
<button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>