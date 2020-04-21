<?php
function isLogged(){
    if(empty($_SESSION['login'])){
        header("Location: logowanie.php");
    }
}

function aplication(){
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link):
        $sql = "SELECT * FROM `tasks` WHERE login='".$_SESSION['login']."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik):
        ?>
        <table class="table table-hover table-striped">
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
                    <input class="btn btn-info" name="edit" type="submit" value="Edytuj">
                </form></td>
                <td><form action="task_del_check.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $rekord -> id ?>">
                    <input class="btn btn-danger" name="edit" type="submit" value="Usuń">
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
    endif;
}

function editForm(){
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
            <div class="form-group">
                <input type="hidden" name="toEdit" value="<?php echo $toEdit ?>">
                <label for="taskEdit">Zadanie: </label><br>
                <textarea id="taskEdit" name="task" rows="2" required><?php echo $rekord -> task ?></textarea>
            </div>
            <div class="form-group">
                <label for="taskDeadline">Data ukończenia: </label>
                <input id="taskDeadline" type="date" name="taskDeadline" value="<?php echo $rekord -> deadline ?>">
            </div>
            <input class="btn btn-success" type="submit" value="Edytuj">
            <?php endwhile; ?>
            </form>
        <?php endif;
    endif;
}

function loginCheck(){
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
}

function registerCheck(){
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
}

function addCheck(){
    if(empty($_SESSION['login'])){
        header("Location: logowanie.php");
    }
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    $login = $_SESSION['login'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "INSERT INTO `tasks`(`login`, `task`, `deadline`) VALUES ('".$login."','".$task."','".$deadline."')";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Dodano nowe zadanie!";
        } else {
            echo "Nie udało się dodać nowego zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
}

function delCheck(){
    //$toDelete = $_POST['toDelete']; --> ta zmienna pochodzi ze starej metody usuwania
    $toDelete = $_POST['id'];
    $login = $_SESSION['login'];
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    if($link){
        $sql = "DELETE FROM `tasks` WHERE id='".$toDelete."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik){
            echo "Usunięto zadanie!";
            header('Location: aplikacja.php');
        } else {
            echo "Nie udało się usunąć zadania!";
        }
    } else {
        echo "Nie udało się nawiązać połączenia z bazą danych!";
    }
}
function editCheck(){
    // Kod aktualizujący dane w bazie
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
}

// Wyświetlenie zadań, których data zakończenia jest dzisiaj
function today(){
    $link = new mysqli('localhost', 'user', 'zaq12wsx', 'whattodo');
    $date = date("Y-m-d");
    if($link):
        $sql = "SELECT * FROM `tasks` WHERE login='".$_SESSION['login']."' AND deadline='".$date."'";
        $wynik = $link -> query($sql);
        $link -> close();
        if($wynik):
        ?>
        <table class="table table-hover table-striped">
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
                    <input class="btn btn-info" name="edit" type="submit" value="Edytuj">
                </form></td>
                <td><form action="task_del_check.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $rekord -> id ?>">
                    <input class="btn btn-danger" name="edit" type="submit" value="Usuń">
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
    endif;
}

?>