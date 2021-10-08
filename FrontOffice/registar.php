<?php
session_start();
if (isset($_SESSION["user"])) {
	header("location: index.php");
     exit;
    }

$username = "";
$password = "";
$confirmpassword = "";
$email = "";


$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirmpassword = $_POST['confirmpassword'];

    $msg = '';
   
    function validateUsername($username)
    {
        global $msg;
        if (strlen(trim($username)) == 0) {
            $msg = "Username obrigatório";
            return false;
        }
        $conn = mysqli_connect("localhost", "root", "", "lojagg");
        $sql = "SELECT * FROM users WHERE username = '$username'";
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

    function validateEmail($email)
    {
        global $msg;
        if (strlen(trim($email)) == 0) {
            $msg = "Email obrigatório";
            return false;
        }

        $conn = mysqli_connect("localhost", "root", "", "lojagg");
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $resultset = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultset) > 0) {
            $msg = "Email já utilizado";
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "Email inválido";
            return false;
        }
        
        return true;
    }
    /*
    function validateFullname($fullname)
    {
        global $msg;
        if (strlen(trim($fullname)) == 0) {
            $msg = "Nome obrigatório";
            return false;
        }
        return true;
    }

    function validateMorada($morada)
    {
        global $msg;
        if (strlen(trim($morada)) == 0) {
            $msg = "Morada obrigatório";
            return false;
        }
        return true;
    }

    function validateTelemovel($telemovel)
    {
        global $msg;

        $telefone = (int) $telemovel;
        if (strlen(trim($telemovel)) == 0) {
            $msg = "Telemovel obrigatório";
            return false;
        }

        if (!filter_var($telemovel, FILTER_VALIDATE_INT)) {
            $msg = "Telemovel inválido";
            return false;
        }
        return true;
    }
    function validate()
    {
    }*/


    if (validateUsername($username)) {
        if (validatePassword($password, $confirmpassword)) {
            if (validateEmail($email)) {
                $sql = "INSERT INTO users(username,password,email) values ('$username','$password','$email')";
                if (mysqli_query($conn, $sql)) {
                    header("Location: login.php");
                } else {
                    global $msg;
                    $msg = "Erro na Criação do Utilizador";
                    var_dump(mysqli_error($conn));
                }
            }
        }
    }
}
mysqli_close($conn);
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
</head>

<body>

    <body>
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <center>
                        <br><br><br>
                        <div style="background-color: #15161D">
                        <a href="../FrontOffice/index.php" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <br><br>
        <div class="registar-page">
            <div class="form">
                <form class="registar-form" action="registar.php" method="POST" align="center">
                    <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                    <br>
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" />
                    <br>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                    <br>
                    <input type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php echo $confirmpassword; ?>" />
                    <br>
                    <button>Registar</button>
                    <p class="message">Already registered? <a href="login.php">Sign In</a></p>
                    <p style="color: #cc0000"><?php echo @$msg ?></p>
                </form>
            </div>
        </div>
        <br>
        </form>

    </body>
</center>

</html>