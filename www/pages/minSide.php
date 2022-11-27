<?php
include "../assets/inc/standar.include.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/CSS/hjemstyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <title>MinSide</title>
</head>

<body>

  <div class="topnav">
    <a href="hjem.php">Hjem</a>
    <a href="utleie.php">Annonser din hybel</a>
    <a class="active" href="minSide.php">Min side</a>
    <div style="position:absolute;right:185px;"><a href="../assets/lib/loggUt.php">Logg ut</a></div>
    <div style="position:absolute;right:0px;"><a href="minSide.php"><?php echo $_SESSION['brukernavn']; ?></a></div>

  </div>

  <p>admin session value = <?php echo $_SESSION['rolle']; ?></p>


  <div class="overskrift">Endre brukeropplysninger:</div>


  <div class="overskrift"><button class="button"><a href="endreBrukeropplysninger.php">Endre brukeropplysninger</a></button></div>



  <div class="overskrift">Mine hybler:</div>


  <?php
  //For å få opp kun sine egne annonser. 
  $eier = $_SESSION['brukernavn'];
  $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
        FROM hybel WHERE eier = :eier";

  $q = $pdo->prepare($sql);

  //bindParam fordi den sliter fælt med å kjøre hardkoda variable med $-tegn rett inn i sql-setningen. 
  $q->bindParam(':eier', $eier, PDO::PARAM_STR);

  try {
    $q->execute();
  } catch (PDOException $e) {
    echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
  }
  //$q->debugDumpParams();

  //lager array, overskrives i loopen, om vi lagrer rett i "session"
  $artikkel_id = [];
  //$_SESSION['hybel_id']= []; 


  $hybler = $q->fetchAll(PDO::FETCH_OBJ);
  echo '<div class="flex-container">';
  if ($q->rowCount() > 0) {

    foreach ($hybler as $hybel) {

      //$_SESSION['hybel_id'][] = $hybel->hybel_id;
      $artikkel_id[$hybel->hybel_id] = $hybel->hybel_id;

      echo '<a href="artikkel.php?hybel_id=';
      echo $artikkel_id[$hybel->hybel_id] . '"</a>';

      echo "<card>";
      echo '<box1> <img src="../assets/img/' . $hybel->bilde . '"</box1>';
      echo '<div class="tekstbox">';
      echo "<h2>" . $hybel->navn . "</h2>";
      echo "<p>" . $hybel->adresse . "</p>";
      echo "<p>" . $hybel->pris . ",-</p>";
      echo "<p>" . $hybel->hybel_id . "</p>";
      echo "</div>";
      echo "</card>";
      echo "</a>";
    }
  } else {
    echo "The query resulted in an empty result set.";
  }

  echo '</div>';
  ?>







  <?php
  include "../assets/inc/footer.php";
  ?>
</body>

</html>