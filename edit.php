<?php
include 'db_config.php';
include 'functions.php';

$connessione= connect_db($servername, $username, $password, $dbname);

// controllo se la connessione con il database è andata a buon fine
if($connessione && $connessione->connect_error){
  echo ("Connection failed: " . $connessione->connect_error);
  exit();
}

// vado a recuperarmi l'id passato nel
$id_stanza = intval($_GET['id']);


// inizializzo una variabile con una query che mi recupera tutte le info per l'id selezionato
$sql ="SELECT *, floor FROM stanze WHERE id = $id_stanza ";

 ?>

 <?php

  include 'layout/head.php';
  include 'layout/header.php';

  ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
  <?php
   $result = $connessione -> query($sql);

   if($result && $result->num_rows >0){

    $row = $result -> fetch_assoc()?>
       <!-- mi prendo i dati in input e li invio alla pagina edit manager -->
       <form class="form-group" action="edit_manager.php" method="post">
         <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
         <label for="">Numero stanza</label>
         <input class="form-control" type="text" name="room_number" value="<?php echo $row['room_number'] ?>">
         <label for="">Piano</label>
         <input class="form-control" type="number" name="floor" value="<?php echo $row['floor'] ?>">
         <label for="">Letti</label>
         <input class="form-control" type="number" name="beds" value="<?php echo $row['beds'] ?>">
         <input type="submit" name="" value="Modifica">
       </form>
    <?php

   }elseif($result){
     echo"Non ci sono risultati";
   }else{
     echo "si è verificato un errore";
   }
  $connessione->close();
   ?>
      </div>
    </div>
  </div>
