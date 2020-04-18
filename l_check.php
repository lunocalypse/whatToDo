<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
    <?php
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "SELECT * FROM `users` WHERE login='".$_SESSION['login']."' AND password='".$_SESSION['password']."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik && mysqli_num_rows($wynik) == 1){

            header("Location: aplikacja.php");

        } else {
            echo "Nie udało się zalogować!";
            echo"<br><a href='logowanie.php'>Logowanie</a> <a href='rejestracja.php'>Rejestracja</a>";
            session_destroy();
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    $_POST = array();
    ?>
    
</body>

</html>