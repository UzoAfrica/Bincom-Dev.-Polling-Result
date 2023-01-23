<?php 

include "../includes/config.php";

$id= (int) $_GET["id"];

$sql= "SELECT * FROM announced_pu_results
JOIN polling_unit ON 
polling_unit.uniqueid=announced_pu_results.polling_unit_uniqueid
JOIN  lga ON  lga.uniqueid = polling_unit.lga_id
WHERE lga.state_id=25 AND lga.uniqueid=$id";

$query= $conn->query($sql);

$result_sets = $query->fetch_all(MYSQLI_ASSOC);

echo json_encode($result_sets);


