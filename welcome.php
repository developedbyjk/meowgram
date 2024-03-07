<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
    <h1>Welcome now you are logged in

    <?php
    echo $_SESSION['username'];
    ?>
    </h1>

    <form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>

</body>
</html>