<?php

//action.php

session_start();


if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  $product_id = $_POST["product_id"];
  $product_name = $_POST["product_name"];
  $product_price = $_POST["product_price"];
  $product_quantity =$_POST["product_quantity"];

    $newID = count($_SESSION["shopping_cart"])+1;

    $_SESSION["shopping_cart"] [$newID] ['product_id']= $product_id;  
    $_SESSION["shopping_cart"] [$newID] ['product_name']= $product_name;
    $_SESSION["shopping_cart"] [$newID] ['product_price']= $product_price;
    $_SESSION["shopping_cart"] [$newID] ['product_quantity']=$product_quantity;

   }
  
 }

 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values["product_id"] == $_POST["product_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }


?>