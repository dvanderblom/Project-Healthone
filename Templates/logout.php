<?php
include_once('defaults/head.php');
include_once('../Modules/Database.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>

<div class="container">
  <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
  ?>

  <h3>Uitloggen</h3><br><br>

  <form method="post" action="">
    <button class="button" type="submit" name="submit">Log uit</button>
  </form>
 
  <?php 

  if(isset($_POST['submit'])) {
    unset($_SESSION['loggedin']);
    echo "<meta http-equiv='refresh' content='0'>";
    header('Location:home');
  }
  include_once('defaults/footer.php');
  ?>

</div>
</body>
</html>
<style>
  .button {
    height: 40px;
    width: 150px;
    border: 1px solid black;
    border-radius: 5px;
    background: white;
   
  }
</style>