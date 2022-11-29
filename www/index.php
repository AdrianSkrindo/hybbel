<?php

include ('assets/inc/noSessionInclude.php');


if (isset($_POST['login'])) {

  $brukernavn = $_POST['brukernavn'];
  $sql = "SELECT * FROM brukere WHERE brukernavn = '$brukernavn'";
  $q = $pdo->prepare($sql);


  try {
    $q->execute();
  } catch (PDOException $e) {
    echo $e->getMessage() . "<br>";
  }

  $bruker = $q->fetch(PDO::FETCH_OBJ);

  if (isset($bruker->passord)) {
    if (password_verify($_REQUEST['passord'], $bruker->passord)) {

      $_SESSION["id"] = $bruker->id;
      $_SESSION["brukernavn"] = $bruker->brukernavn;
      $_SESSION["passord"] = $bruker->passord;
      $_SESSION["fnavn"] = $bruker->fnavn;
      $_SESSION["enavn"] = $bruker->enavn;
      $_SESSION["rolle"] = $bruker->rolle;
      $_SESSION['login'] = 1;

      header("Location:pages/hjem.php");
      exit();
    } else {
      $messages[] = "Brukernavn og/eller passord er galt";
    }
  } else {
    $messages[] = "Brukernavn og/eller passord er galt";
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
      <p><input type="text" name="brukernavn" placeholder="Brukernavn eller e-post"></p>
      <p><input type="password" name="passord" placeholder="Passord"></p>
      <p class="remember_me">
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
  //$pass = 12345;
  //echo password_hash($pass, PASSWORD_DEFAULT);
  ?>

  <?php
  include "assets/inc/footer.php";
  ?>
  
</body>

</html>