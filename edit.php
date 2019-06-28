<?php
include 'db_config.php';
include 'functions.php';

$connessione= connect_db($servername, $username, $password, $dbname);

// controllo se la connessione con il database è andata a buon fine
if($connessione && $connessione->connect_error){
  echo ("Connection failed: " . $connessione->connect_error);
  exit();
}

 ?>

 <?php

  include 'layout/head.php';
  include 'layout/header.php';

  ?>


  <div class="container">
    <div class="row">
      <div class="col-12">
        

      </div>
    </div>
  </div>
