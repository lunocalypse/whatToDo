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
    delCheck(); // Ta część kodu odpowiada za usunięcie zadania z bazy danych
?>
<br>
<button><a href="aplikacja.php">Strona główna</a></button>
</body>

</html>