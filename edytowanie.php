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
    <h1>Edytuj zadanie!</h1>
    
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
            <form action="edytowanie.php" method="POST">
            <select name="toEdit">
            <?php
            while($rekord = $wynik -> fetch_object()):
            ?>
                <option><?php echo $rekord -> task ?></option>
            <?php endwhile; ?>
            </select>
            <input name="edit" id="edit" value="Edytuj" type="submit">
            </form>
            <?php
            else:
                echo "Brak zadań!";
            endif;
            
        else:
            echo "Nie udało się nawiązać połączenia z bazą danych!";
        endif; ?>
    
    
        <form action="task_edit_check.php" method="POST">
        <br>
        <label for="task">Zadanie: </label>
        <input id="task" name="task" type="text" required><br><br>
        <label for="deadline">Data: </label>
        <input id="deadline" name="deadline" type="date" required><br><br>
        <input type="submit" name="send" value="Zmień">
        </form>

<br><br>

<button><a href="aplikacja.php">Strona główna</a></button>


<script type="text/javascript">
document.getElementById("edit").addEventListener('click', function () {
    var text = document.getElementById('task');
    text.value = '<?php echo $rekord -> task ?>';
});
</script>

</body>

</html>