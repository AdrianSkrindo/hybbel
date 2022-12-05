<?php

class slettArtikkel {

    public function fjernArtikkel()
    {
        global $pdo;
        $sql = "DELETE FROM hybel
                WHERE hybel_id = :id";

        $q = $pdo->prepare($sql);


        $q->bindParam(':id', $hybel_id, PDO::PARAM_INT);

        $hybel_id = $_GET['hybel_id'];

        try {
            $q->execute();          
            header("location:feedbackStatus.php");
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
        }
    }
}
