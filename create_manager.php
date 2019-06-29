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
 include 'layout/head.php';
 include 'layout/header.php';

 ?>
<?php
// recuper i dati dalla post e me li salo in delle variabili
    $room_number = intval($_POST['room_number']);
    $floor = intval($_POST['floor']);
    $beds = intval($_POST['beds']);
    $sql = "INSERT INTO `stanze` (`room_number`, `floor`, `beds`, `created_at`, `updated_at`) VALUES ($room_number, $floor, $beds, NOW(), NOW())";

    $result = $connessione->query($sql);
 ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <?php if ($result) {
        echo "Stanza inserita con successo";
      }else{
        echo "Qualcosa non ha funzionato";
      }?>
    </div>
    <div class="back">
      <a href="index.php" class="btn btn-primary">Torna alla Home</a>
    </div>

  </div>

</div>
