<?php
// Initialize the session
session_start();
if (!isset($_SESSION["admin"])) {
   header("location: index.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "mysql", "lojagg");

if(!$conn){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET['id']) && $_GET['id'] !== '') {
    $admin_id = $_GET['id'];
    $sql = "DELETE FROM admins WHERE id=" . $admin_id;
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('Admin eliminado com Sucesso!') </script>";
        header("location: dashboard.html");
        exit;
    } else {
        echo "Erro ao eliminar";
    }
}else{
    echo "failed";
}
?>
