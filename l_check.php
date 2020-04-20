<?php
    session_start();
    include 'functions.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>

<body>
<?php
    isLogged();
    loginCheck();
?>
    
</body>

</html>