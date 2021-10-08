<?php
session_start();

if (isset($_SESSION["user"])) {
	header("location: index.php");
     exit;
    }
$username = "";
$password = "";
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
        <div class="login-page">
            <div class="form">
                <form class="login-form" action="login.php" method="POST" align="center">
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" />
                    <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                    <button>Login</button>
                    <p class="message">Not registered? <a href="registar.php">Create an account</a></p>
                </form>
            </div>
        </div>
        <center>
            <?php
            $conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

            if (!$conn) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
                $resultset = mysqli_query($conn, $sql);
                if (mysqli_num_rows($resultset) > 0) {
                    $row = mysqli_fetch_assoc($resultset);
                    $id = $row['id'];
                    $username = $row['username'];
                    $_SESSION["user"] = $username;
                    $password = $row['password'];
                    $user = array("id" => $id, "username" => $username, "password" => $password);
                    echo json_encode($user);

                    header("Location: index.php");
                    exit;
                } else {
                    echo "Nome de Utilizador/Password inválido";
                }
            }
            mysqli_close($conn);
            ?>
        </center>
    </body>

</html>