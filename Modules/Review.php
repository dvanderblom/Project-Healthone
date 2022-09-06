<?php
function getReviews($productId) {
  global $pdo;

  $query = $pdo->prepare("SELECT * FROM review where product_id = $productId");
  $query->execute();
 
  $reviews = $query->fetchAll(PDO::FETCH_ASSOC);  
  return $reviews;
}

function saveReview($reviewRating, $reviewDescription, $reviewUserName, $productId) {
  global $pdo;

  $query = $pdo->prepare("INSERT INTO review (review_description, review_rating, review_username, product_id)
  VALUES (:review_description, :review_rating, :reviewUserName, :productId)");

  $query->bindParam('review_description', $reviewDescription);
  $query->bindParam('review_rating', $reviewRating);
  $query->bindParam('reviewUserName', $reviewUserName);
  $query->bindParam('productId', $productId);

  $query->execute();
}

function displayReviews($product_id) {
  $reviews = getReviews($product_id);
  $member = new Member();
  $rank = $member->getRank();
  
  foreach($reviews as &$review) {
    echo '<tr>';
      echo '<td>'.$review['review_username'].'</td>';
      echo '<td>'.$review['review_rating'].'/10</td>';
      echo '<td>'.$review['review_description'].'</td>';
    echo '</tr>';
  }
}        

function delReview($reviewId) {
  global $pdo;

  $query = $pdo->prepare("DELETE * FROM review where review_id = :reviewId");
  $query->bindParam('reviewId', $reviewId);
  $query->execute();
}
