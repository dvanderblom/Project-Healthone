<?php
class member {
  public $id;
  public $name;

  public function __construct() {
    settype($this->id, 'integer');
  }

  public function getRank() {
    if(isset($_SESSION['fullname'])) {
      $fullName = $_SESSION['fullname'];
    }
        
    global $pdo;

    $query = $pdo->prepare('SELECT `rank` FROM members where full_name = :fullName');
    $query->bindParam('fullName', $fullName);
    $query->execute();

    $rank = $query->fetch(PDO::FETCH_ASSOC);
    return $rank;
  }

  public function getMember($email) {
    global $pdo;
    $query = $pdo->prepare("SELECT * from members where email = '$email'"); // TODO: change email
    $query->execute();
    
    $member = $query->fetch(PDO::FETCH_ASSOC);
    return $member;
  }
}