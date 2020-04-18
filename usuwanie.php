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
    <h1>Usuń zadanie!</h1>
    
    <?php
    echo "Witaj, ".$_SESSION['login']."!";
    ?>
    <br><br>

<?php
        $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
        if($link):
            $sql = "SELECT * FROM `tasks` WHERE login='".$_SESSION['login']."'";
            $wynik = $link -> query($sql);
            $link -> close();
            if($wynik):
            ?>
            <form action="task_del_check.php" method="POST" >
            <select name="toDelete">
            <?php
            while($rekord = $wynik -> fetch_object()):
            ?>
                <option value="<?php echo $rekord -> id ?>"><?php echo $rekord -> task ?></option>
            <?php endwhile; ?>
            </select>
            <input type="submit" value="Usuń">
            </form>
            <?php
            else:
                echo "Brak zadań!";
            endif;
            
        else:
            echo "Nie udało się nawiązać połączenia z bazą danych!";
        endif; ?>
    
    <br><br>

    <button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>