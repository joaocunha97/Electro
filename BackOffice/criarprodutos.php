<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: index.php");
    exit;
}

$nome = "";
$preco = "";
$descricao = "";
$categoria = "";
$imagem = "";

?>

<?php
$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $imagem = $_FILES['foto']['name'];
    $img_dir = $_FILES['foto']['tmp_name'];
    $msg = "";


    function validateNome($nome)
    {
        global $msg;
        if (strlen(trim($nome)) == 0) {
            $msg = "Nome obrigatório";
            return false;
        }
        $conn = mysqli_connect("localhost", "root", "", "lojagg");
        $sql = "SELECT * FROM produtos WHERE nome = '$nome'";
        $resultset = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultset) > 0) {
            $msg = "Nome já utilizado";
            return false;
        }
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
            global $msg;
            $msg = "Preço tem de ser um numero";
            return false;
        }

        return true;
    }

    function validateDescricao($descricao)
    {
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
        var_dump($categoria);;
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

                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES['foto']['name']);

                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // Valid file extensions
                    $extensions_arr = array("jpg", "jpeg", "png", "gif");
                    $pic = rand() . "." . $imageFileType;
                    // Check extension
                    if (in_array($imageFileType, $extensions_arr)) {
                        move_uploaded_file($img_dir, $target_dir . $pic);
                    } else {
                        $msg = "Erro no Upload da Imagem";
                    }

                    $sql = "INSERT INTO produtos (nome,preco,descricao,category_id,image) values ('$nome','$preco','$descricao','$categoria','$pic')";
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
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                <p>Criar Produtos</p>
            </div>
            <center>
            <div class="form">
                <form enctype="multipart/form-data" action="criarprodutos.php" class="criarprodutos-form" method="POST"  style="text-align:center;">
                    <h1> Criar Produtos</h1>
                    <br>
                    <label>Nome: </label><input type="text" name="nome" placeholder="Nome do Produto" value="<?php echo $nome; ?>" />
                    <br><br>
                    <label>Preço: </label><input type="text" name="preco" placeholder="Preço" value="<?php echo $preco; ?>" />
                    <br><br>


                    <label >Descrição: </label>
                   
                    <br><textarea id="descricao" name="descricao" placeholder="Descrição do produto.."   style="height:100px; width:310px; resize:none;"></textarea>
                  
            </div>
            <div class="col-75">
                <br><br>
                <label for="categoria">Categoria: </label>
                <select name="categoria">
                    <option value=1>Computadores</option>
                    <option value=2>Telemoveis</option>
                    <option value=3>Periféricos</option>
                    <option value=4>Componentes</option>
                    <option value=5>Imagem</option>
                    <option value=6>Outros</option>
                </select>
                <br>
                <br>
                <span>Imagem do Produto: <input type="file" class="center-block" name="foto" /></span>
                <br>
                <button class='btn btn-primary'>Criar Produto</button>
                <p style="color: #cc0000"><?php echo @$msg ?></p>

                </form>
</center>

            </div>
        </div>
        </form>
        </div>
    </section>

</body>

</html>