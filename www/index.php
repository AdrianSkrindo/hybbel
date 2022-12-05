<?php

require_once 'assets/inc/noSessionInclude.php';

if(ISSET($_POST['login'])){
  //hvis brukernavn og passord begge IKKE er blank
  if($_POST['brukernavn'] != "" || $_POST['passord'] != ""){
    
    //henter bruker fra databasen basert på inntastet brukernavn
    $sql = "SELECT * FROM `brukere` WHERE `brukernavn`=? ";

    $query = $pdo->prepare($sql);
    //kjører queryen med dataen fra $_POST['username']
    $query->execute([$_POST['brukernavn']]);
    //henter bruker basert 
    $bruker = $query->fetch();
    
    //hvis $bruker er satt og passordet blir godkjent og unhashet riktig, kjør koden
    if ($bruker && password_verify($_POST['passord'], $bruker['passord']))
      {
        //oppretter session for en user med IDen som hører til den brukeren
        //og sender den til "forsiden"
        $_SESSION['bruker'] = $bruker['id'];
        header("location:pages/hjem.php");
      } else {
        //hvis ikke sender den en built-in dialogboks som varsler feil passord eller brukernavn
        echo
        "
          <script>
            alert('Feil brukernavn eller passord')
          </script>
          <script>
            window.location = 'index.php'
          </script>
        ";
      }
  } else {
    //dialogboks for når feltene er tomme.
    echo
    "
      <script>
        alert('Vennligst fyll inn alle feltene!')
      </script>
      <script>
        window.location = 'index.php'
      </script>
    ";
  }
}
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
<div class="vert-center">  
<div class="login">
    <h1>H Y B B E L . N O</h1>
    <form method="post" action="">
      <p><input type="text" name="brukernavn" placeholder="Brukernavn eller e-post"> </p>
      <p><input type="password" name="passord" placeholder="Passord"></p>
      <!-- <p class="checkbox"><input type="checkbox" name="remember"/> <label> Husk meg </label>
      <p class="remember_me"> -->
        <label>
          <a href="pages/registrerBruker.php">
          Ikke bruker? Registrer deg her!</a>
        </label>
      </p>
      <p class="submit"><input type="submit" name="login" value="Logg inn"></p>
    </form>
  </div>
</div>



  <?php
  include "assets/inc/footer.php";
  ?>
  
</body>

</html>