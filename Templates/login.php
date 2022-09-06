<?php
include_once('defaults/head.php');
include_once('../Modules/Database.php');
include_once('../Classes/Member.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="/css/login.css">
  </head>
  <body>

  <div class="container">
  <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
  ?>

  <h3>Inloggen</h3><br><br>

  <form action="" method="post">
    <label for="email">Email:</label><br>
    <input placeholder="voorbeeld@voorbeeld.com" type="text" name="email" autocomplete="off"><br><br>
    <label for="password">Wachtwoord:</label><br>
    <input placeholder="Wachtwoord" id="password" type="password" name="password" autocomplete="off" value=""><br><br>
    <i class="bi bi-eye-slash" id="toggle-password"></i>

    <p id="error" style="color: red" hidden>Niet alle velden zijn ingevuld.</p>
    <p id="error2" style="color: red" hidden>Inlog-gegevens onjuist.</p>
    <button type='submit' name='submit'>Inloggen</button><br><br>
  </form>

  <a href="register">Nog geen account? Klik hier om je te registreren</a><br><br>

  <?php 
  if(isset($_POST['submit'])) {
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $Member = new Member();
      $member = $Member->getMember($email);
      
      if($member['email'] == $email && $member['pass_word'] == $password) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        $_SESSION['fullname'] = $member['full_name'];
        $_SESSION['loggedin'] = true;
        header('Location:home');
      } else echo "<script>const err=document.querySelector('#error2'); err.hidden=false</script>";
    } else echo "<script>const err=document.querySelector('#error'); err.hidden=false</script>";
  }

  include_once('defaults/footer.php');
  ?>
  </div>
  <script src="/js/togglepassword.js"></script>
  </body>
</html>

