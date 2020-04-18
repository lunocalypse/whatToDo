<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
</head>

<body>
    <!-- STRONA REJESTRACJI -->
    <h1>Zarejestruj się!</h1>

    <!-- Formularz rejestracji -->
    <form action="r_check.php" method="POST">

        <label for="login">Login: </label>
        <input id="login" name="login" type="text" required><br><br>
        <label for="password">Hasło: </label>
        <input id="password" name="password" type="password" required><br><br>
        <input id="send" name="send" type="submit" value="Zarejestruj">
    </form>
</body>

</html>