<?php
include_once('defaults/head.php');
include_once('../Modules/Contact.php');
include_once('../Classes/Member.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/css/contact.css">
</head>
<body>

<div class="container">
  <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');

    if(isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      $Member = new Member();
      $member = $Member->getMember($email);
    }
  ?>
  <h4>Contact</h4><br><br>
  
  <form action="" method="post">
    <div class="row">
      <div class="col-md-12">
        <?php 
        if(isset($_SESSION['loggedin'])) {
          $fullName = $_SESSION['fullname'];
          $email = $member['email'];
          echo "<input disabled type='text' name='fullname' value='$fullName'>";
          echo "<input disabled type='text' name='email' style='margin-left: 15px' value='{$email}'><br><br>";
        } else {
          echo "<input type='text' name='fullname' placeholder='Volledige naam'>";
          echo "<input type='text' name='email' style='margin-left: 15px' placeholder='voorbeeld@voorbeeld.com'><br><br>";
        }
        ?>
      </div>
    </div>
    <label for="phone-number" style="display: block">Telefoon-nummer:</label>
    <input name="phone-number" type="phone" placeholder="06-12573869"><br><br>
    <label for="contact-message">Schrijf hier een opmerking/suggestie:</label>
    <textarea name="contact-message"></textarea><br>
    <button name="submit" type="submit">Versturen</button>  
  </form>
  
  <?php 
  if(isset($_POST['submit'])) {
    if(isset($_SESSION['loggedin'])) {
      $name = $_SESSION['fullname'];
      $email = $_SESSION['email'];
    } else {
      $name = $_POST['fullname'];;
      $email = $_POST['email'];
    }
    $phone = $_POST['phone-number'];
    $contactMessage = $_POST['contact-message'];

    $headers = 'From: '.$name.' <'.$email.'>\r\n';
    $headers .= 'Reply-To: '.$email.'\r\n';
    $headers .= 'Content-type: text/html\r\n';

    mail('dvanderblomzakelijk@gmail.com', 'HealthOne', $contactMessage, $headers);
  }

  

  include_once('defaults/footer.php'); 
  ?>
</div>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</body>
</html>