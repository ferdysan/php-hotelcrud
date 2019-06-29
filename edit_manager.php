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

var_dump($_POST);
 // vado a recuperarmi i dati passati dalla post
 $id =intval($_POST['id']);
 $room_number = intval($_POST['room_number']);
 $floor = intval($_POST['floor']);
 $beds = intval($_POST['beds']);
 $sql = "UPDATE `stanze` SET `floor` = $floor, `beds` = $beds, `updated_at` = NOW() WHERE `stanze`.`id` = $id;";


 $result = $connessione->query($sql);

 var_dump($result);

   include 'layout/head.php';
   include 'layout/header.php';

 ?>

 <div class="container">
   <div class="row">
     <div class="col-12">
       <?php if ($result) {
         echo "Modifica Effettuata con successo";
       }else{
         echo "Qualcosa non ha funzionato";
       } ?>

     </div>
    </div>
  </div>
