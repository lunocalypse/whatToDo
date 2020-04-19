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
    echo "Użytkownik: ".$_SESSION['login'];
    ?>
    <br><br>
    <!-- Formularz edytowania zadania -->

<?php
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    $toEdit = $_POST['id'];
    if($link):
        $sql = "SELECT * FROM `tasks` WHERE id='".$toEdit."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik):
        ?>
            <form action="task_edit_check.php" method="POST">
            <?php
            while($rekord = $wynik -> fetch_object()):
            ?>
                <input type="hidden" name="toEdit" value="<?php echo $toEdit ?>">
                <label for="taskEdit">Zadanie: </label>
                <input id="taskEdit" type="text" name="taskEdit" value="<?php echo $rekord -> task ?>"><br><br>
                <label for="taskDeadline">Data ukończenia: </label>
                <input id="taskDeadline" type="date" name="taskDeadline" value="<?php echo $rekord -> deadline ?>"><br><br>
                <input type="submit" value="Edytuj">
            
            <?php endwhile; ?>
            </form>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>