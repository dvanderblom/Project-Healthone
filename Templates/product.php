<?php
require_once('../Modules/Products.php');
?>

<!DOCTYPE html>
<html>

  <body>

    <div class="container">
      <?php

      $uri = $_SERVER['REQUEST_URI'];
      $productId = substr($uri, -2);

      if($productId[0] == "/") $productId = substr($productId, -1);

      echo "<div class='row gy-3'>";
      displayProduct($productId);
      echo "</div>";

      function displayProduct($product_id) {
        $product = getProduct($product_id); 
        $productImage = '../../'.$product['product_image'];
        echo "<div class='product-container'>";
          echo "<div class='row'>";
            echo "<div class='col-md-6 card'>";
              echo "<div class='mt-3 mb-3'><h2>{$product["product_title"]} - &euro;{$product["product_price"]},99</h2></div>";
              echo "<img style='max-width: 300px; max-height: 250px; padding-bottom: 20px' class='product-img img-responsive center-block' src='{$productImage}'/>";
            echo "</div>";
            echo "<div class='col-md-6 card'>";
              echo "<div class='card-body'>";
                echo "<div><h2>Beschrijving</h2></div>";
                echo "<div><p>{$product['product_description']}</p></div>";
              echo "</div>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      }

      include_once('reviews.php');
      //echo '<hr>';
      include_once('defaults/footer.php');
      ?>
      <script src='reviews.js'></script>
    </div>
  </body>
</html>
<style>
  .product-container { 
    /* border: 2px solid lightgray; */
    border-radius: 5px;
    margin: 50px 0 50px 12px;
    width: 1297px;
    height: 300px;
    padding-bottom: none;
    padding-top: -30px;
  } 

   .product-description {
    border-right: none;
    border-bottom: none;
    width: auto; 
    height: 370px;
    margin-bottom: -10px;
  }
</style>

