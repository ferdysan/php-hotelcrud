<!-- effettuo la connessione al database -->

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
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Room Number</th>
          <th scope="col">Floor</th>
          <th scope="col">Beds</th>
          <th scope="col">created at</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

    <?php
    $sql = "SELECT *, floor FROM stanze ";
    // funzione query la freccia e come la notazione punto
    $result = $connessione->query($sql);

    // controllo quante righe ci sono nel risultato della mia chiamata al database
    if ($result && $result->num_rows > 0) {
    // output data of each row
    // prendi una riga dei tuoi risultati e salvalo nella variabile row una riga per volta
    while($row = $result->fetch_assoc()) {?>

      <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['room_number'] ?></td>
          <td><?php echo $row['floor'] ?></td>
          <td><?php echo $row['beds'] ?></td>
          <td><?php echo $row['created_at'] ?></td>
          <td> <a href="show.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Visualizza</a> </td>
          <td> <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Modifica</a> </td>
      </tr>

      <?php
       }
    } elseif ($result) {
       echo "Non ci sono risultati";
    } else {
      echo "Si è verificato un errore";
    }
    $connessione->close();

     ?>

    </table>
    </div>
  </body>
</html>
