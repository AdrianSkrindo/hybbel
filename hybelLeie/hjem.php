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
    <link rel="stylesheet" href="CSS/hjemstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Hjemside</title>
</head>
<body>

<div class="topnav">
  <a class="active" href="hjem.php">Hjem</a>
  <a href="#news">Nyheter</a>
  <a href="minSide.php">Min side</a>
  <a class="loggUT" href="loggUT.php">Logg ut</a>
</div>

<p>Du er nå logget inn på brukeren <?php echo $_SESSION['brukernavn']."."; ?></p>

<?php
/*
    $sql = "SELECT sted, pris, hybel_id FROM hybel";
    $result = mysqli_query($conn, $sql);
    $hybelArray = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $hybelArray[] = $row;


        }
    }

    //print_r($hybelArray);
  



    function build_table($hybelArray){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($hybelArray[0] as $key=>$value){
        $key = match ($key) {
            "sted" => "By",
            "pris" => "Månedspris",
            "hybel_id" => "Hybel ID"
        };
          
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $hybelArray as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';

    return $html;
}


echo build_table($hybelArray); */
?>
<section class="basic-grid">
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aG91c2V8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60')"><div class="cardtxt">1</div></div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1572120360610-d971b9d7767c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">2</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">3</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG91c2V8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60')">4</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8aG91c2V8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60')">5</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">6</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1575517111478-7f6afd0973db?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">7</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1598228723793-52759bba239c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">8</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGhvdXNlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60')">9</div>
    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1554995207-c18c203602cb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8aG91c2V8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60')">10</div>

</section>   



    
</body>
</html>