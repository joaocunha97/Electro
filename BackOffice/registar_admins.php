<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("location: index.php");
    exit;
}

$username = "";
$password = "";
$confirmpassword = "";
?>
<?php


$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $msg = '';

    function validateUser($username)
    {
        global $msg;
        if (strlen(trim($username)) == 0) {
            $msg = "Username obrigatório";
            return false;
        }
        $conn = mysqli_connect("localhost", "root", "", "lojagg");
        $sql = "SELECT * FROM admins WHERE username = '$username'";
        $resultset = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultset) > 0) {
            $msg = "Username já utilizado";
            return false;
        }
        return true;
    }


    function validatePassword($password, $confirmpassword)
    {
        global $msg;
        if (strlen(trim($password)) == 0) {
            $msg = "Password obrigatório";
            return false;
        }
        if ($password != $confirmpassword) {
            $msg = "Passwords não são iguais";
            return false;
        }

        return true;
    }




    if (validateUser($username)) {
        if (validatePassword($password, $confirmpassword)) {
            $sql = "INSERT INTO admins(username,password) values ('$username','$password')";
            if (mysqli_query($conn, $sql)) {
                header("Location: dashboard.php");
            } else {
                global $msg;
                $msg = "Erro na Criação do Utilizador";
                var_dump(mysqli_error($conn));
            }
        }
    }
}

mysqli_close($conn);
?>


<html>
<html lang="en">
<center>

    <head>
        <title>OneTech</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="OneTech shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main_styles.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>

    <body>
        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <center>
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="D:\wamp\www\PAP\FrontOffice">OneTech</a></div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="registaradmins-page">
            <div class="form">
                <form class="registaradmins-form" action="registar_admins.php" method="POST" align="center">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" />
                    <br>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                    <br>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php echo $confirmpassword; ?>" />
                    <br>
                    <button>Registar</button>
                    <p style="color: #cc0000"><?php echo @$msg ?></p>
                </form>
            </div>
        </div>
        <br>

    </body>
</center>

</html>