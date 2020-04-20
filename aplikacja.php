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
<!-- STRONA Główna -->
<h1>Aplikacja WhatToDo!</h1>
    
<?php
    isLogged();
    echo "Użytkownik: ".$_SESSION['login'];
?>

<!-- PRZYCISK WYLOGOWANIA -->
<button><a href="logout.php">Wyloguj</a></button>

<h3>Twoje zadania</h3>

<?php
    aplication();
?>

<br>
<button><a href="dodawanie.php">Dodaj</a></button>

</body>

</html>