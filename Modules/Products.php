<?php
function getProducts(int $categoryId) {
  include_once("../Templates/categories.php");
  global $pdo;
  $query = $pdo->prepare("SELECT * FROM products where category_id = $categoryId");
  $query->execute();
 
  $products = $query->fetchAll(PDO::FETCH_ASSOC);  
  return $products;
}

function getProduct(int $productId) {
  //include_once("../Templates/products.php");
  global $pdo;
  $query = $pdo->prepare("SELECT * FROM products where product_id = $productId");
  $query->execute();
 
  $product = $query->fetch(PDO::FETCH_ASSOC);
  return $product;
}
