<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'hybelprosjekt');
$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST; // Driver is set here

try {
  $pdo = new PDO($dsn, DB_USER, DB_PASS);
} catch (PDOException $e) {
  echo 'Error connecting to database: ' . $e->getMessage(); // Never do this in production
}


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
  <div class="login">
    <h1>H Y B B E L . N O</h1>
    <form method="post" action="" method="post">
      <p><input type="text" name="brukernavn" placeholder="Brukernavn eller e-post"></p>
      <p><input type="password" name="passord" placeholder="Passord"></p>
      <p class="remember_me">
        <label>
          <input type="checkbox" name="remember_me" id="remember_me">
          Ikke bruker? Registrer deg her!
        </label>
      </p>
      <p class="submit"><input type="submit" name="login" value="Logg inn"></p>
    </form>
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