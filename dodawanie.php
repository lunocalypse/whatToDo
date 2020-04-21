<?php
    session_start();
    include 'functions.php';
    isLogged();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WhatToDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS od Bootstrapa -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

<!-- STRONA DODAWANIA ZADANIA -->
<div class="jumbotron text-center">
    <h1>WhatToDo</h1>
    <p>
        <?php
            echo "Użytkownik: <span class='text-primary'>".$_SESSION['login']."</span>";
        ?>
    </p>
    <!-- PRZYCISK WYLOGOWANIA -->
    <a href="logout.php"><button class="btn btn-primary">Wyloguj</button></a>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <!-- Formularz dodawania zadania -->
            <h3>Dodaj zadanie</h3>
            <form action="task_add_check.php" method="POST">
                <div class="form-group">
                    <label for="task">Zadanie: </label><br>
                    <textarea id="task" name="task" type="text" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="deadline">Data ukończenia: </label>
                    <input id="deadline" name="deadline" type="date" required>
                </div>
                <div class="form-group">
                    <label for="important">Ważne: </label>
                    <select id="important" name="important" required>
                        <option value="0">Nie</option>
                        <option value="1">Tak</option>
                    </select>
                </div>
                <input class="btn btn-success" id="send" type="submit" value="Dodaj">
            </form>
        </div>
        <div class="col-sm-3">
            <a href="aplikacja.php"><button class="container-fluid btn btn-secondary">Strona główna</button></a>
        </div>
    </div>
</div>

</body>

</html>