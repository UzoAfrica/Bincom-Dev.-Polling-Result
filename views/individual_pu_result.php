

<?php 

$sql= "SELECT * FROM announced_pu_results
JOIN polling_unit ON 
polling_unit.uniqueid=announced_pu_results.polling_unit_uniqueid
JOIN  lga ON  lga.uniqueid = polling_unit.lga_id
WHERE lga.state_id=25";

$query= $conn->query($sql);

$result_sets = $query->fetch_all(MYSQLI_ASSOC);

?>

<div class="row justify-content-center">

<div class="col-6">

<div class="table-responsive">
    <h3 class="h3">RESULT OF INDIVIDUAL PULLING UNIT IN DELTA STATE</h3>
<table class="table table-striped table-hover">

<tr>

<th>LGA ID</th><th>LGA</th><th>PU NAME</th><th>PARTY</th><th>SCORE</th>

</tr>
<?php 
foreach ($result_sets as $result){ ?>
<tr>

<td><?php echo $result['uniqueid']?></td>
<td><?php echo $result['lga_name']?></td>
<td><?php echo $result['polling_unit_name']?></td>
<td><?php echo $result['party_abbreviation']?></td>
<td><?php echo $result['party_score']?></td>

</tr>

<?php }?>


</table>
</div>
</div>


</div>