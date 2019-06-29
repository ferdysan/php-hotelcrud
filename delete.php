<?php

include 'db_config.php';
include 'functions.php';

$connessione= connect_db($servername, $username, $password, $dbname);

// controllo se la connessione con il database è andata a buon fine
if($connessione && $connessione->connect_error){
  echo ("Connection failed: " . $connessione->connect_error);
  exit();
}

if(empty($_POST)){
  echo ' si è verificato un errore';
  exit();
}

$id_stanza = $_POST['id'];

$sql = "DELETE FROM `stanze` WHERE `stanze`.`id` = $id_stanza";

$result = $connessione->query($sql);

include 'layout/head.php';
include 'layout/header.php';
 ?>

 <div class="container">
   <div class="row">
     <div class="col-12">
       <?php if ($result) {
         echo "La stanza è stata cancellata";
       }else{
         echo "Qualcosa non ha funzionato";
       } ?>
       <div class="back">
         <a href="index.php" class="btn btn-primary">Torna alla Home</a>
       </div>

     </div>
    </div>
  </div>
