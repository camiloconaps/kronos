<?php
require_once("bd_conf/conexion.php");
                $sql = " SELECT * FROM Campanas";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                        while($line = $result->fetch_assoc()) {
        			$taxcalc=$line[CAMPANA];
                        }
                }
		echo $taxcalc;
	
?>

