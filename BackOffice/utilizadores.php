<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: index.php");
    exit;
}
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 15;
$offset = ($pageno - 1) * $no_of_records_per_page;
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
        <?php include("css/table.css"); ?>.pagination {
            display: inline-block;
        }

        .pagination a {
            color: white;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #279be4;
        }

        .pagination a.active {
            background-color: #279be4;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
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
                <li class="active">
                    <a href="utilizadores.php"><i class="fa fa-usd"></i> Utilizadores</a>
                </li>
                <li>
                    <a href="encomendas.php"><i class="fa fa-pencil-square-o"></i> Encomendas</a>
                </li>
                <li>
                    <a href="admins.php"><i class="fa fa-sitemap"></i>Admins</a>
                </li>
                <li>
                    <a href="logout.php"><i class="fa fa-line-chart"></i> Logout</a>
                </li>
                <!--
                <li>
                    <a href="#"><i class="fa fa-comments-o"></i>Social Marketing</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-map-marker"></i> Get Traffic</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> Employees</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar-o"></i> Reservations</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                </li>
                -->
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
                            <!-- <div class="nav-profile-image">-->
                            <!--<img src="https://skynet.marketecture.com/user_avatars/258800/Hayley-Helsten.jpg" alt="profile-img" alt="profile image" /> -->
                            <div class="nav-profile-name">
                                <b><?php echo $_SESSION["admin"]; ?></b><i class="fa fa-caret-down"></i>
                            </div>
                            <!--</div>-->
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

            $total_pages_sql = "SELECT COUNT(*) FROM produtos";
            $resultset = mysqli_query($conn, $total_pages_sql);
            $total_rows = mysqli_fetch_array($resultset)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);


            $sql = "SELECT id, username, email FROM users LIMIT $offset, $no_of_records_per_page";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<div id='container'><table class='normal'> <thead> <tr> <th>ID</th> <th>Username</th> <th>Email</th>  <th>Eliminar</th> </tr> </thead> <tbody>";
                while ($utilizadores = mysqli_fetch_assoc($result)) {
                    echo "<tr> <td>" . $utilizadores["id"] . "</td> <td>" . $utilizadores["username"] . " </td> <td> " . $utilizadores["email"] . " <td><a class='btn btn-danger' href = eliminar_utilizador.php?id=" . $utilizadores["id"] . " onClick=\"return confirm('Are you sure you want to delete??');\">Eliminar</a></td> </tr>";
                }
                echo "</tbody> </table> </div>";
            } else {
                echo "No Results";
            }
            ?>

            <br><br><br><br>
            <div style="float:right; margin-right:255px;" class="pagination">
                <a href="?pageno=1">First</a>
                <a class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>" href="<?php if ($pageno <= 1) {
                                                                                    echo '#';
                                                                                } else {
                                                                                    echo "?pageno=" . ($pageno - 1);
                                                                                } ?>">Prev</a>
                <a class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>" href="<?php if ($pageno >= $total_pages) {
                                                                                                echo '#';
                                                                                            } else {
                                                                                                echo "?pageno=" . ($pageno + 1);
                                                                                            } ?>">Next</a>
                <a href="?pageno=<?php echo $total_pages; ?>">Last</a>
            </div>
        </div>
    </section>

</body>

</html>