<?php

include 'layout/head.php';
include 'layout/header.php';

?>


<div class="container">
  <div class="col-12">
    <form class="form-group" action="create_manager.php" method="post">
      <label for="">Numero stanza</label>
      <input class="form-control" type="text" name="room_number" value="">
      <label for="">Piano</label>
      <input class="form-control" type="number" name="floor" value="">
      <label for="">Letti</label>
      <input class="form-control" type="number" name="beds" value="">
      <input type="submit" name="" value="Invia">
    </form>
  </div>
</div>
