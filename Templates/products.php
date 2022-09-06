<?php
include_once('defaults/head.php');
include_once('../Modules/Products.php');
?>

<!DOCTYPE html>
<html>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    ?>

    <?php
    $uri = $_SERVER['REQUEST_URI'];
    $categoryId = substr($uri, -1);
    
    echo "<div class='row gy-3'>";
    while($categoryId == 1 || $categoryId == 2 || $categoryId == 3 || $categoryId == 4) {
        displayProducts($categoryId);
        break;
    }
    echo "</div>";

    function displayProducts($category) {
        $products = getProducts($category);

        global $categoryId;
        foreach($products as &$product) {
            echo "<div class='col-sm-4 col-md-3'>";
                echo "<a href='$categoryId/product/{$product['product_id']}' style='height: 250px; overflow: hidden; color: black; text-decoration: none;' class='card mb-3 mt-3'>";
                    echo "<div class='card-body text-center'>";
                    echo "<img style='width: 250px; height: 180px;' class='product-img img-responsive center-block' src='{$product["product_image"]}'/>";
                    echo "<div class='card-title mb-3'>{$product["product_title"]}</div><br>";
                    echo "</div>";
                echo "</a>";
            echo "</div>";
        }
    }

    include_once('defaults/footer.php');
    ?>
</div>

</body>
</html>

