<?php
function getContactInfo() {
  global $pdo;
  $query = $pdo->prepare("SELECT * FROM contact");
  $query->execute();
 
  $contactInfo = $query->fetchAll(PDO::FETCH_ASSOC);
  return $contactInfo;
}