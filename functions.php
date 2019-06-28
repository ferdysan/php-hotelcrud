<?php

// creo una funzione che mi connette al Database
function connect_db($servername, $username, $password, $dbname){
  $connessione = new mysqli($servername, $username, $password, $dbname );
  return $connessione;
}



 ?>
