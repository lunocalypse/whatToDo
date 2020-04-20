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
    editCheck();
?>    
<br>
<button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>