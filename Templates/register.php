<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="/css/register.css">
</head>
<body >
  <div class="container">
  <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
  ?>

  <h3>Maak hier je account aan</h1><br><br>

  <form action="" method='post'>
    <label for="name">Volledige naam:</label>
    <label style="margin-left: 485px" for="email">Email:</label><br>
    <input placeholder="Jan Klaassen" style="width: 600px" type="text" autocomplete="off" name='fullname'>
    <input placeholder="voorbeeld@voorbeeld.com" style="width: 600px" type="text" autocomplete="off" name='email'><br><br>

    <label for="password">Wachtwoord:</label>
    <label style="margin-left: 505px" for="repeat-password">Wachtwoord herhalen:</label><br>
    <input placeholder="Wachtwoord" style="width: 600px" autocomplete="off" type="password" id="password" name="password"><i class="bi bi-eye-slash" id="toggle-password"></i>
    <input placeholder="Wachtwoord herhalen" name="repeat-password" autocomplete="off" style="width: 600px" id="password2" type="password"><br><br><br>
    
    <p id='error' style='color: red' hidden>Niet alle velden zijn ingevuld.</p>
    <p id='error2' style='color: red' hidden>Wachtwoorden komen niet overeen.</p>
    
    <button name='submit' type='submit'>Registreren</button><br><br>
    <a href="login">Al een account? Klik hier om in te loggen.</a>
  </form>
  <?php include_once('defaults/footer.php');?>
  </div>
  <script src='/js/togglepassword.js'></script>
</body>
</html>

<?php
include_once('defaults/head.php');
include_once('../Modules/Contact.php');
require '../Modules/Database.php';

if(isset($_POST['submit'])) {
  if(!empty($_POST['fullname']) && !empty($_POST['password']) && !empty($_POST['repeat-password']) && !empty($_POST['email'])) {
    $fullName = $_POST['fullname'];
    $password1 = $_POST['password'];
    $password2 = $_POST['repeat-password'];
    $email = $_POST['email'];
    
    comparePasswords($password1, $password2, $fullName, $email);
  } else echo "<script>const err=document.querySelector('#error'); err.hidden=false</script>";
} 

function comparePasswords($password1, $password2, $fullName, $email) {
  if($password1 == $password2) {
    sendInfo($fullName, $password1, $email); 
    header('Location:login');
  } else echo "<script>const err=document.querySelector('#error2'); err.hidden=false</script>";
}

function sendInfo($fullName, $password, $email) {
  global $pdo;
  $query = $pdo->prepare("INSERT INTO members (member_id, full_name, pass_word, email, `rank`) 
  VALUES ('DEFAULT', '$fullName', '$password', '$email', 'member')");
  $query->execute();
}