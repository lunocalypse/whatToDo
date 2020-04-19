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
    echo "Użytkownik: ".$_SESSION['login'];
    ?>

    <!-- PRZYCISK WYLOGOWANIA -->
    <button><a href="wylogowanie.php">Wyloguj</a></button>

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
                    <th></th>
                    <th></th>
                </tr>
            <?php
            while($rekord = $wynik -> fetch_object()):
            ?>
                <tr>
                    <td><?php echo $rekord -> task ?></td>
                    <td><?php echo $rekord -> deadline ?></td>
                    <td><form action="edytowanie.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $rekord -> id ?>">
                        <input name="edit" type="submit" value="Edytuj">
                    </form></td>
                        <td><form action="task_del_check.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $rekord -> id ?>">
                        <input name="edit" type="submit" value="Usuń">
                    </form></td>
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

</body>

</html>