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
    <!-- STRONA Główna -->
    <h1>Aplikacja WhatToDo!</h1>
    
    <?php
    if(empty($_SESSION['login'])){
        header("Location: logowanie.php");
    }
    echo "Witaj, ".$_SESSION['login']."!";
    ?>
    <h3>Twoje zadania</h3>

    <?php
        $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
        if($link):
            $sql = "SELECT * FROM `tasks` WHERE login='".$_SESSION['login']."'";
            $wynik = $link -> query($sql);
            $link -> close();
            if($wynik):
            ?>
            <table border="1">
                <tr>
                    <th>Zadania</th>
                    <th>Termin ukończenia</th>
                </tr>
            <?php
            while($rekord = $wynik -> fetch_object()):
            ?>
                <tr>
                    <td><?php echo $rekord -> task ?></td>
                    <td><?php echo $rekord -> deadline ?></td>
                </tr>
            <?php endwhile; ?>
            </table>
            <?php
            else:
                echo "Brak zadań!";
            endif;
            
        else:
            echo "Nie udało się nawiązać połączenia z bazą danych!";
        endif; ?>


        <br>
        <button><a href="dodawanie.php">Dodaj</a></button>
        <button><a href="usuwanie.php">Usuń</a></button>
        <button><a href="edytowanie.php">Edytuj</a></button>

    

</body>

</html>