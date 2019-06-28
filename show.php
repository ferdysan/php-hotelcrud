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
       <h3>Stanza ID : <?php echo $id_stanza ?></h3>
<?php

// eseguo la mia query
$result = $connessione->query($sql);

if($result && $result->num_rows > 0){

  while ($row = $result->fetch_assoc()){?>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="img/stanza_hotel.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          <ul>
            <li>Numero Stanza : <?php echo $row['room_number'] ?></li>
            <li>Piano : <?php echo $row['floor'] ?></li>
            <li>Letti : <?php echo $row['beds'] ?></li>
          </ul>
        </p>
        <a href="index.php" class="btn btn-primary">Vai a tutte le stanze</a>
      </div>
     </div>
   </div>
  </div>
</div>
<?php

  }
}elseif ($result) {
   echo "Non ci sono risultati";
} else {
  echo "Si è verificato un errore";
}
$connessione->close();
?>
