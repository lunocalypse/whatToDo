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
    addCheck(); // Ta część kodu odpowiada za dodanie zadania do bazy danych
?>
<br>
<button><a href="dodawanie.php">Dodaj ponownie</a></button>
<button><a href="aplikacja.php">Strona główna</a></button>
</body>

</html>