<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);
        
            if (isset($_GET['product_id'])) {
                include_once "../Templates/product.php";

            } else {
                include_once "../Templates/products.php";
            }
           
        } else {
            include_once "../Templates/categories.php";
        }
        break;
    case 'contact':
        $titleSuffix = ' | Contact';

        include_once "../Templates/contact.php";
        break;
    case 'register':
        $titleSuffix = ' | Registreren';
        
        include_once "../Templates/register.php";
        break;
    case 'login':
        $titleSuffix = ' | Inloggen';

        include_once "../Templates/login.php";
        break;
    case 'logout':
        $titleSuffix = ' | Uitloggen';

        include_once "../Templates/logout.php";
        break;
    case 'profiel':
        $titleSuffix = ' | Profiel';

        include_once "../Templates/profile.php";
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
