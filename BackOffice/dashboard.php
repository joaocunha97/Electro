<?php
session_start();

if (!isset($_SESSION["admin"])) {
   header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
    <title>Dashboard</title>
</head>

<body>
    <section id="sidebar">
        <div class="white-label"></div>
        <div id="sidebar-nav">
            <ul>
                <li class="active">
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="produtos.php"><i class="fa fa-desktop"></i> Produtos</a>
                </li>
                <li>
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
                                <div class="nav-profile-name"><b><?php echo $_SESSION["admin"]; ?></b><i class="fa fa-caret-down"></i>
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
                <p>Dashboard</p>
            </div>
            <div class="widget-box sample-widget">
                <div class="widget-header">
                    <h2>Widget Header</h2>
                    <i class="fa fa-cog"></i>
                </div>
                <div class="widget-content">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/87118/sample-data-1.png" />
                </div>
            </div>
            <div class="widget-box sample-widget">
                <div class="widget-header">
                    <h2>Widget Header</h2>
                    <i class="fa fa-cog"></i>
                </div>
                <div class="widget-content">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/87118/sample-data-1.png" />
                </div>
            </div>
            <div class="widget-box sample-widget">
                <div class="widget-header">
                    <h2>Widget Header</h2>
                    <i class="fa fa-cog"></i>
                </div>
                <div class="widget-content">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/87118/sample-data-1.png" />
                </div>
            </div>
            <div class="widget-box sample-widget">
                <div class="widget-header">
                    <h2>Widget Header</h2>
                    <i class="fa fa-cog"></i>
                </div>
                <div class="widget-content">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/87118/sample-data-1.png" />
                </div>
            </div>
        </div>
    </section>

</body>

</html>