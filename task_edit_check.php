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
    <?php
    $taskEdit = $_POST['taskEdit'];
    $taskDeadline = $_POST['taskDeadline'];
    $id = $_POST['toEdit'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "UPDATE `tasks` SET `task` = '".$taskEdit."', `deadline` = '".$taskDeadline."' WHERE id='".$id."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Edytowano zadanie!";
            header('Location: aplikacja.php');
        } else {
            echo "Nie udało się usunąć zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
    ?>
    
    <br>
    <button><a href="aplikacja.php">Strona główna</a></button>

</body>

</html>