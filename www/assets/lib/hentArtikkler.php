<?php

class Artikkel
{

    public function fetchAll()
    {
        global $pdo;
        $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
            FROM hybel WHERE status =1";

        $q = $pdo->prepare($sql);

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
                //echo "<p>" . $hybel->hybel_id . "</p>";
                echo "</div>";
                echo "</card>";
                echo "</a>";
            }
        } else {
            echo "The query resulted in an empty result set.";
        }
    }

    public function byPris()
    {
        global $pdo;
        $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
        FROM hybel WHERE status =1 ORDER BY pris ASC";

        $q = $pdo->prepare($sql);

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
                //echo "<p>" . $hybel->hybel_id . "</p>";
                echo "</div>";
                echo "</card>";
                echo "</a>";
            }
        } else {
            echo "The query resulted in an empty result set.";
        }
    }

    public function nyeste()
    {

        global $pdo;
        $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
        FROM hybel WHERE status =1 ORDER BY opprettet DESC";

        $q = $pdo->prepare($sql);

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
                //echo "<p>" . $hybel->hybel_id . "</p>";
                echo "</div>";
                echo "</card>";
                echo "</a>";
            }
        } else {
            echo "The query resulted in an empty result set.";
        }
    }

    public function eldste()
    {
        global $pdo;
        $sql = "SELECT hybel_id, navn, adresse, pris, bilde 
        FROM hybel WHERE status =1 ORDER BY opprettet ASC";

        $q = $pdo->prepare($sql);

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
                //echo "<p>" . $hybel->hybel_id . "</p>";
                echo "</div>";
                echo "</card>";
                echo "</a>";
            }
        } else {
            echo "The query resulted in an empty result set.";
        }
    }
}
