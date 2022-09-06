<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories() {
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM categories");
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
    
  } catch(PDOException $e) {
    die("Error! ".$e->getMessage());
  }
}

function getCategoryName(int $id) {
  try {
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM categories where category_id = $id");
    $query->execute();
    $categoryName = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categoryName;
    
  } catch(PDOException $e) {
    die("Error! ".$e->getMessage());
  }
}
