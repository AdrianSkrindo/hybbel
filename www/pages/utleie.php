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
    <title>utleie</title>
</head>
<body>

<div class="topnav">
        <a href="hjem.php">Hjem</a>
        <a class="active" href="utleie.php">Annonser din hybel</a>
        <a href="minSide.php">Min side</a>
        <a class="loggUt" href="../assets/lib/loggUt.php">Logg ut</a>
    </div>
    en form, men ønskelig inputs, som pusher en query opp til databasen
    <div class="brukerBox">
        <form method="post" action="">
            <h2>Månedspris: <input type="text" name="pris" placeholder="<?php echo "tall" ?>" required><br></h2>
            <h2>Depositum: <input type="text" name="depo" placeholder="<?php echo "tall" ?>" required><br></h2>
            <h2>Boligtype: <input type="email" name="bType" placeholder="<?php echo "dropdown med alternativer?" ?>" required><br></h2>
            <h2>Ledig fra: <input type="text" name="ledig" placeholder="<?php echo "kan styre med kalender og date datatype om vi ønsker her" ?>" required><br></h2>
            <h2>Inkl. TV: <input type="text" name="inklTv" placeholder="<?php echo "dropdown med alternativer?" ?>" required><br></h2>
            <h2>Inkl. Strøm: <input type="text" name="inklStr" placeholder="<?php echo "dropdown med alternativer?" ?>" required><br></h2>
            <h2>Inkl. Internett: <input type="email" name="inklInt" placeholder="<?php echo "dropdown med alternativer?" ?>" required><br></h2>

            <input type="submit" name="registrer" value="Endre brukeropplysninger" class="button">
        </form>
    </div>

<?php
include "../assets/inc/footer.php";
?>
</body>
</html>