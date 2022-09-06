<?php
include_once('defaults/head.php');
include_once('../Modules/Database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<link rel="stylesheet" href="/css/profile.css">
</head>

<body>

<div class="container">
  <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');

    if(isset($_SESSION['fullname']) && isset($_SESSION['email'])) {
      $fullName = $_SESSION['fullname'];
      $email = $_SESSION['email'];

      $password = getPassword($_SESSION['email'], $_SESSION['fullname']);
    }
  ?>
  
  <h4>Jouw profiel</h4><br><br>
  
  <form action="" method="post">
    <input disabled style="margin-right: 31px" name="fullname" type="text" id="fullname" value="<?php if(isset($_SESSION['fullname'])) echo $fullName; ?>">
    <input disabled type="text" name="email" id="email" value="<?php if(isset($_SESSION['email'])) echo $email; ?>"><br><br>
    <input disabled style="margin-right: 31px" name="password" type="password" placeholder="Wachtwoord" id="password" value="<?php echo $password['pass_word']; ?>">
    <i class="bi bi-eye-slash" id="toggle-password"></i><br><br>
    <button hidden id="save-profile" type="submit" name="submit" style="margin-top: 15px">Opslaan</button>
  </form>

  <button id="edit-profile">Profiel aanpassen</button>  
 
<?php 
if(isset($_POST['submit'])) {
  $fullName = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  sendInfo($fullName, $password, $email);
  //echo 'Profiel succesvol aangepast.';
}

function getPassword($email, $fullName) {
  global $pdo;

  $query = $pdo->prepare('SELECT `pass_word` FROM members where email = :email AND full_name = :fullName');
  $query->bindParam('fullName', $fullName);
  $query->bindParam('email', $email);
  $query->execute();

  $password = $query->fetch(PDO::FETCH_ASSOC);
  return $password;
}

function sendInfo($fullName, $pasword, $email) {
  global $pdo;

  $query = $pdo->prepare("UPDATE members SET full_name = :fullName");
  $query2 = $pdo->prepare("UPDATE members SET pass_word = :pasword");
  $query3 = $pdo->prepare("UPDATE members SET email = :email");
  $query->bindParam('fullName', $fullName);
  $query2->bindParam('pasword', $pasword);
  $query3->bindParam('email', $email);
  
  $query->execute();
  $query2->execute();
  $query3->execute();
}

include_once('defaults/footer.php');
?>
</div>
<script src='/js/profile.js'></script>
<script src='/js/togglepassword.js'></script>
</body>
</html>

