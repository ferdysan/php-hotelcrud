<?php
include 'db_config.php';
include 'functions.php';

$connessione= connect_db($servername, $username, $password, $dbname);

echo "<pre>";
var_dump($connessione);
echo "</pre>";

// controllo se la connessione con il database è andata a buon fine
if($connessione && $connessione->connect_error){
  echo ("Connection failed: " . $connessione->connect_error);
  exit();
}


// vado a recuperarmi l'id passato nel mysqli_get_links_stats
$id_stanza = intval($GET_['id']);


$sql =""






 ?>
