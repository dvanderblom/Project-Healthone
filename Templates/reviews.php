<?php
require '../Modules/Review.php';
require '../Classes/Member.php';
?>
<!DOCTYPE html>
<html> 
<head>
  <link rel="stylesheet" href="/css/reviews.css">
</head>
<body>
  <div class="container">
    <?php
      $uri = $_SERVER['REQUEST_URI'];
      $path = substr($uri, 0, strrpos($uri, '/'));
      $productId = substr($uri, -2);

      if($productId[0] == "/") $productId = substr($productId, -1);

      if(isset($_SESSION['loggedin'])) {
        $email = $_SESSION['email']; 
        $Member = new Member();
        $rank = $Member->getRank();
        $member = $Member->getMember($email);
      }
     
    ?>
  
    <div class="row">
      <div class="col-md-6">
        <h4>Reviews</h4>
      </div>
      <div class="col-md-6">
        <?php
        if(isset($_SESSION['loggedin'])) {
          echo '<button class="button review-button" type="button">Review Toevoegen</button>';
        } else echo '<button class="button" type="button"><a href="/login" style="color: white; text-decoration: none">Review Toevoegen</a></button>';
        ?>
      </div>
    </div>
    
    <hr style="width: 1295px; margin-left: -11px"><br>
    
    <div class="reviews mb-5">
      <table class="table table-striped" style="width: 1295px; margin-left: -11px">
        <tr>
          <th>Gebruikersnaam</th>
          <th>Beoordeling</th>
          <th>Review</th>
        </tr>
        <?php displayReviews($productId);?>
      </table>
    </div>

    <div hidden class="review-form">
      <h4>Voeg een review toe</h4>
      <hr style="width: 1295px; margin-left: -11px"><br>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-6"><input class="input" disabled type="text" value="<?php echo $member['full_name']; ?>"></div>
          <div class="col-md-6"><input class="input" disabled type="text" style="margin-left: -8px" value="<?php echo $member['email']; ?>"></div><br><br><br>
        </div>
        <label for="review-rating">Welk cijfer geef je dit product?</label>
        <input type="number" name="review-rating" class="stars" value="10" min="1" max="10"><br><br>
        <label for="review-description">Wat vond je ervan?</label>
        <textarea name="review-description"></textarea><br><br>
        <button class="button" style="margin-left: 565px" type="submit" name="submit">Versturen</button>
      </form>
    </div>
    <?php
    if(isset($_POST['submit'])) {
      if(!empty($_POST['review-rating']) && !empty($_POST['review-description'])) {
        $reviewRating = $_POST['review-rating'];
        $reviewDescription = $_POST['review-description'];
        $reviewUserName = $_SESSION['fullname'];

        saveReview($reviewRating, $reviewDescription, $reviewUserName, $productId);
        echo "<meta http-equiv='refresh' content='0'>";
      } 
    }
    ?>
  </div>
  <script src="/js/reviews.js"></script>
</body>
</html>
