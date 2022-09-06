<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
include_once('../Modules/Categories.php');
include_once('../Modules/Products.php');
?>

<body>

<div class="container">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
        </ol>
    </nav>
    
    <?php
    $products = getProducts(1);

    $uri = $_SERVER['REQUEST_URI'];
    $index = substr($uri, -1);
    
    echo "<div class='row gy-3'>";
    while($index == "s") {
        displayCategories();
        break;
    }
    echo "</div>";

    function displayCategories() {
        $categories = getCategories();
        
        foreach($categories as &$category) {
            echo "<div class='col-sm-4 col-md-3'>";
                echo "<a style='text-decoration: none; color: black;' href='categories/{$category['category_id']}' class='card'>";
                    echo "<div class='card-body text-center'>";
                        echo "<img class='product-img img-responsive center-block' src='{$category["category_picture"]}'/><br>";
                        echo "<div class='card-title mb-3'>{$category["category_name"]}</div>";
                    echo "</div>";
                echo "</a>";
            echo "</div>";
        }
        include_once('defaults/footer.php');
    } 
    
    ?>
</div>

</body>
</html>

