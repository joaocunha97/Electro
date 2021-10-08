<?php

session_start();
$users = $_SESSION['users'];
foreach($users as $i => $k) {
}
require('entidades/phpmailer/class.phpmailer.php');
?>


<?php



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail (ssl/tls)

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; //portas 25, 465 ou 587
    $mail->Username = 'crazyegg123456@gmail.com';  
    $mail->Password = 'crazyegg';           
    $mail->SetFrom('crazyegg123456@gmail.com', 'Electro');
    
    //Permitir caracteres latinos 
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    
    //Assunto do mail
    $mail->Subject = 'Electro - Factura';

    if(!isset($_SESSION['lastinvoice'])){

      $_SESSION["lastinvoice"]=0;
      }
      $_SESSION["lastinvoice"]+=1;
      
    
    //Corpo do mail
    $mail->Body = "A factura nr ".$_SESSION["lastinvoice"]. "segue em anexo";
    
    //Endereço do destinatário:
    $mail->AddAddress($_SESSION['demail']);
       
    $ficheiro=fopen("invoices/invoice_".$_SESSION["lastinvoice"].".txt","w") or die("Erro na abertura do ficheiro!");

   

    $linha = "Fatura nr: ".$_SESSION["lastinvoice"]. PHP_EOL. PHP_EOL;
    fwrite($ficheiro, $linha);

    $linha = "Data: ".date("d/m/Y"). PHP_EOL. PHP_EOL;
    fwrite($ficheiro, $linha);

    $linha = "Nome: " . $_SESSION['display'] .PHP_EOL;
    fwrite($ficheiro, $linha);

    $linha = "Morada: " . $_SESSION['dmorada'] .PHP_EOL. PHP_EOL.PHP_EOL;
    fwrite($ficheiro, $linha);

    foreach($_SESSION['cart'] as $i => $k) {

        $linha =  $_SESSION['cart'][$i].'    1€'.PHP_EOL;
        @$total=$total+1;
        fwrite($ficheiro, $linha);
  
    }
    $linha = PHP_EOL. "Total: ".@$total.'€';
    fwrite($ficheiro, $linha);
  
    fclose($ficheiro);


     //Adicionar anexo
     $mail->AddAttachment("invoices/invoice_".$_SESSION["lastinvoice"].".txt" , 'Invoice.txt'); // attach files/teste.pdf, and rename it to teste.pdf
     
     unset($_SESSION['cart']);
    
    //Enviar mail:
    if(!$mail->Send()) {
       echo 'Mail error: '.$mail->ErrorInfo; 
    } else {
        echo 'alert'("Hello! I am an alert box!");
         
    }
}

?>