
<?php
$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$res = array();
$category = $_GET['category'];


$sql = "SELECT produtos.nome, produtos.descricao ,produtos.preco, category.NAME, produtos.image FROM produtos INNER JOIN category on produtos.category_id=category.category_id WHERE category.NAME=". $category.";";

$resultset = mysqli_query($conn, $sql);

//Veridica se o resultset tem dados
if (mysqli_num_rows($resultset) > 0) {
	//vai buscar os dados do resultset usando mysqli_fetch_all( MYSQLI_ASSOC ):
	$produtos = mysqli_fetch_all($resultset,MYSQLI_ASSOC);

	$res['status'] = 'ok';
	$res['produtos'] = $produtos;
	
	//echo json_encode($produtos);
	
}else {
	$res['status'] = 'vazio';
}

//envia os dados para o cliente via json:

echo json_encode($res);


// Fecha a conexão
mysqli_close($conn);
?>