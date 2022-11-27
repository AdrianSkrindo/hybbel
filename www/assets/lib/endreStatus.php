<?php

class Status
{

    public function endreStatus()
    {
        global $pdo;
        $sql = "UPDATE hybel
                SET
                status = :status
                WHERE hybel_id = :id";

        $q = $pdo->prepare($sql);

        $q->bindParam(':status', $status, PDO::PARAM_STR);
        $q->bindParam(':id', $hybel_id, PDO::PARAM_INT);

        $hybel_id = $_GET['hybel_id'];

        $status = 0;
        /*if ($status <= 0){
            $status = 1;
        } else {
            $status = 0;
        }*/

        try {
            $q->execute();
        } catch (PDOException $e) {
            echo "Error querying database: " . $e->getMessage() . "<br>"; // Never do this in production
        }
    }
}
