<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["admin"])) {
   header("location: index.php");
    exit;
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
    

    <title>Dashboard</title>
    <style>
        <?php include ("css/table.css"); ?>
    </style>
</head>


<body>
    <section id="sidebar">
        <div class="white-label"></div>
        <div id="sidebar-nav">
            <ul>
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="produtos.php"><i class="fa fa-desktop"></i> Produtos</a>
                </li>
                <li>
                    <a href="utilizadores.php"><i class="fa fa-usd"></i> Utilizadores</a>
                </li>
                <li class="active">
                    <a href="encomendas.php"><i class="fa fa-pencil-square-o"></i> Encomendas</a>
                </li>
                <li>
                    <a href="admins.php"><i class="fa fa-sitemap"></i>Admins</a>
                </li>
                <li>
                    <a href="logout.php"><i class="fa fa-line-chart"></i> Logout</a>
                </li>
            </ul>
        </div>
    </section>
    <section id="content">
        <div id="header">
            <div class="header-nav">
                <div class="menu-button">
                    <!--<i class="fa fa-navicon"></i>-->
                </div>
                <div class="nav">
                    <ul>
                        <li class="nav-profile">
                            <div class="nav-profile-name">
                               <b><?php echo $_SESSION["admin"]; ?></b><i class="fa fa-caret-down"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-header">
                <h1>Admin Area</h1>
                <p>Mostrar Utilzadores Registados</p>
            </div>
            <?php
            $conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

            if (!$conn) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }


            $sql = "SELECT id, quantidade, descricao, produtostatus_id, encomenda_id,produtos_id FROM estadoencomenda";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<div id='container'><table class='normal'> <thead> <tr> <th>ID</th> <th>Data da Encomenda</th> <th>User ID</th>  <th>Eliminar</th> </tr> </thead> <tbody>";
                while ($encomendas = mysqli_fetch_assoc($result)) {
                    echo "<tr> <td>" . $encomendas["id"] . "</td> <td>" . $encomendas["dataencomenda"] . " </td> <td> " . $encomendas["users_id"] . " </td> <td> " . $encomendas["estadoencomenda_id"] . " <td><a class='btn btn-danger' href = eliminar_encomenda.php?id=".$encomendas["id"].">Cancelar Encomenda</a></td> </tr>";
                }
                echo "</tbody> </table> </div>";
            }else{
                echo "No Results";
            }
            ?>
        </div>
    </section>

</body>

</html>