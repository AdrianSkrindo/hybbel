<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hybelprosjekt') or die ("Kunne ikke koble til database.");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LoggInn</title>
  <link rel="stylesheet" href="assets/CSS/indexstyle.css">
</head>

<body>
  <div class="login">
    <h1>H Y B B E L . N O</h1>
    <form method="post" action="" method="post">
      <p><input type="text" name="brukernavn" value="" placeholder="Brukernavn eller e-post"></p>
      <p><input type="password" name="passord" value="" placeholder="Passord"></p>
      <p class="remember_me">
        <label>
          <input type="checkbox" name="remember_me" id="remember_me">
          Husk meg på denne enheten
        </label>
      </p>
      <p class="submit"><input type="submit" name="login" value="Logg inn"></p>
    </form>
  </div>

  <div class="login-help">
    <p>Glemt passord? <a href="#">Klikk her for å tilbakestille</a>.</p>
  </div>
  <?php
  include "assets/inc/footer.php";
  ?>
  <?php

  $brukernavn = " ";
  $passord = " ";

  if (isset($_POST['login'])) {
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];
  }


  $select = mysqli_query($conn, "SELECT * FROM brukere WHERE brukernavn = '$brukernavn' AND passord = '$passord'");
  $row = mysqli_fetch_array($select);

  if (is_array($row)) {
    $_SESSION["brukernavn"] = $row['brukernavn'];
    $_SESSION["passord"] = $row['passord'];
    $_SESSION["fnavn"] = $row['fnavn'];
  } else echo "";

  if (isset($_SESSION["brukernavn"])) {
    header("Location:pages/hjem.php");
  } else die;
  ?>


</body>

</html>