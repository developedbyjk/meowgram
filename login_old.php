<?php
    $user=false;
    $showerror = false;
 
if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    include '_dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];



    
    $sql = "select * from users where username = '$username'";


    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error executing statement: ' . $stmt->error);
    }

    $num = mysqli_num_rows($result);
    echo $num;
    echo "<br>";



    if ($num === 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $hashedPassword = $row['password'];
            $verify = password_verify($password, $hashedPassword);

            if($verify){

            echo "Its a match";

            }else{

            echo "nope";

            }  
           
        }
    }
    else{
        $error = "INVALID USERNAME OR PASSWORD";
        $showerror = true;
    }

}

// $check = password_verify($password, $hashedPassword);
// echo "the check is $check <br>";
// if ( $check ) {
//     // Password is correct
//     $user = true;
//     session_start();
//     $_SESSION['loggedin'] = true;
//     $_SESSION['username'] = $username;
//     header("location: welcome.php");
// } else {
//     // Invalid password
//     $error = "INVALID PASSWORD";
//     $showerror = true;
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>

<?php
if($user){
    echo" <span style='background-color:crimson;color:white;z-index:9999'>You Successfully logged in 😁</span>";
}

if($showerror){
    echo "<br/>";
    echo"<span style='background-color:crimson;color:white;z-index:9999'>Error😢' .$error.'</span>";
}


?>
<div class="container">

    <form action="login.php" method="post">
          
                                <fieldset>
                                    <legend>Username</legend>
                                    <input type="text" name="username" placeholder="Enter Name" id="username" required>
                                </fieldset>
                    
                                <fieldset>
                                    <legend>Password</legend>
                                    <input type="password" name="password" placeholder="Enter Password" id="password" required>
                                </fieldset>
                                <button>
                                    <input type="submit" value="Submit">
                                </button>
                                <br>
                                <br>
                                
                                <p>Dont have an account? <a href="signup.php" >Sign up</a></p>
    </form>
</div>




</body>
</html>