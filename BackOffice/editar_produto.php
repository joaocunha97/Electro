<?php
session_start();

if (!isset($_SESSION["admin"])) {
   header("location: index.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_GET["id"];
$sql = "SELECT id, nome, descricao,preco, category_id, image FROM produtos WHERE id= " . $id;
$result = mysqli_query($conn, $sql);
$produto = mysqli_fetch_assoc($result);

                  
$id=$produto["id"];
$nome = $produto["nome"];
$preco = $produto["preco"];
$categoria = $produto["category_id"];
$descricao = $produto["descricao"];
$imagem = $produto["image"];
$image_src = "../images/".$imagem;

?>

<?php

if (isset($_POST['update'])) {
    
    $id= $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    var_dump($categoria);
    var_dump($imagem);
    $msg = '';

    function validateNome($nome)
    {
        global $msg;
        
        if (strlen(trim($nome)) == 0) {
            $msg = "Nome obrigatório";
            return false;
        }
        var_dump("here");
        return true;
    }


    function validatePreco($preco)
    {
        global $msg;
        if (strlen(trim($preco)) == 0) {
            $msg = "Preço obrigatório";
            return false;
        }
        if (filter_var($preco, FILTER_VALIDATE_FLOAT) === false) {
            $msg = "Preço tem de ser um numero";
            return false;
        }

        return true;
    }

    function validateDescricao($descricao)
    {
        var_dump($descricao);
        global $msg;
        if (strlen(trim($descricao)) == 0) {
            $msg = "Descrição obrigatório";
            return false;
        }
        return true;
    }

    function validateCategoria($categoria)
    {
        global $msg;
        $categoria = (int) $categoria;
        var_dump($categoria);
        global $msg;
        if (filter_var($categoria, FILTER_VALIDATE_INT) === false) {
            $msg = "Categoria obrigatório";
            return false;
        }
        return true;
    }

    /*
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


    if (validateNome($nome)) {
        if (validatePreco($preco)) {
            if (validateDescricao($descricao)) {
                if (validateCategoria($categoria)) {
                    global $msg;
                    var_dump("here");
                    $sql = "UPDATE produtos SET nome = '".$nome."', preco = '".$preco."',descricao = '".$descricao."',category_id = '".$categoria."' WHERE id='".$id."'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script> window.location.replace('produtos.php') </script>";
                    } else {
                        global $msg;
                        $msg = "Erro na Criação do Produto";
                        var_dump(mysqli_error($conn));
                    }
                }
            }
        }
    }
}
mysqli_close($conn);

?>


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
                <li>
                    <a href="dashboard.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active">
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
                <p>Editar Produtos</p>
            </div>
            <div class="form">
                <form action="" class="editarprodutos-form" method="POST" align="center" style="text-align:center;">
                <input type='hidden' name='id' value='<?php echo $produto["id"];?>' />
                    <h1> Editar Produtos</h1>
                    <br>
                    <label>Nome: </label><input type="text" name="nome" placeholder="<?php echo $nome; ?>" value="<?php echo $nome; ?>" />
                    <br><br>
                    <label>Preço:</label> <input type="text" name="preco" placeholder="<?php echo $preco; ?>" value="<?php echo $preco; ?>" />
                    <br><br>
                    
                    <label >Descrição: </label>
                   
                    <br><textarea id="descricao" name="descricao" placeholder="Descrição do produto.."   style="height:100px; width:310px; resize:none;"  value="<?php echo $descricao; ?>"><?php print $descricao; ?></textarea>
                    <br><br>
                    <label for="categoria">Categoria: </label>
                    <select name="categoria">
                        <option value=1 <?php if($categoria==1) echo 'selected="selected"'; ?>>Computadores</option>
                        <option value=2 <?php if($categoria==2) echo 'selected="selected"'; ?>>Telemoveis</option>
                        <option value=3 <?php if($categoria==3) echo 'selected="selected"'; ?>>Periféricos</option>
                        <option value=4 <?php if($categoria==4) echo 'selected="selected"'; ?>>Componentes</option>
                        <option value=5 <?php if($categoria==5) echo 'selected="selected"'; ?>>Imagem</option>
                        <option value=6 <?php if($categoria==6) echo 'selected="selected"'; ?>>Outros</option>
                    </select>
                    <br>
                    <br>
                    <img src='<?php echo $image_src; ?>' height="300px">
                    <br>
                    <input name="update" type="submit" class='btn btn-primary' value="Editar Produto">
                    <p style="color: #cc0000"><?php echo @$msg ?></p>
                </form>
            </div>
        </div>
        </form>
        </div>
    </section>

</body>

</html>
