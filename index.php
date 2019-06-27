<!-- effettuo la connessione al database -->

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_hotel";

$connessione = new mysqli($servername, $username, $password, $dbname );

if($connessione && $connessione->connect_error){
  echo ("Connection failed: " . $connessione->connect_error);
  exit();
}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
<div class="container">
  <table>
    <tr>
      <th>stanza N°</th>
      <th>piano</th>
      <th>Letti</th>
    </tr>

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
            <td><?php echo $row['room_number'] ?></td>
            <td><?php echo $row['floor'] ?></td>
            <td><?php echo $row['beds'] ?></td>
        </tr>

      <?php
       }
    } elseif ($result) {
       echo "0 results";
    } else {
      echo "query error";
    }
    $connessione->close();

     ?>

    </table>
    </div>



<script src="public/js/app.js" charset="utf-8">

</script>
  </body>
</html>
