<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
    <!-- STRONA LOGOWANIA -->
    <h1>Witamy na stronie logowania aplikacji WhatToDo!</h1>

    <!-- Formularz logowania -->
    <form action="l_check.php" method="POST">

        <label for="login">Login: </label>
        <input id="login" name="login" type="text"><br><br>
        <label for="password">Hasło: </label>
        <input id="password" name="password" type="password"><br><br>
        <input id="send" type="submit" value="Zaloguj">
    </form>
    <h3>Nie masz konta? Zarejestruj się!</h3>
    <button><a href="rejestracja.php" style="text-decoration: none; color: black;">Rejestracja</a></button>

</body>

</html>