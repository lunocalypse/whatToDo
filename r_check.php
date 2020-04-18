<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
</head>

<body>
    <?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "INSERT INTO `users`(`login`, `password`) VALUES ('".$login."','".$password."')";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Utworzono nowego użytkownika!";
        } else {
            echo "Nie udało się utworzyć nowego użytkownika!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    $_POST = array();
    ?>
    <br>
    <a href="logowanie.php">Logowanie</a>
    <a href="rejestracja.php">Rejestracja</a>
</body>

</html>