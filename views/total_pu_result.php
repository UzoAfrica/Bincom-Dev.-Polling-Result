<?php 

$sql= "SELECT DISTINCT lga.uniqueid,lga.lga_name FROM announced_pu_results
JOIN polling_unit ON 
polling_unit.uniqueid=announced_pu_results.polling_unit_uniqueid
JOIN  lga ON  lga.uniqueid = polling_unit.lga_id
WHERE lga.state_id=25";
$query = $conn->query($sql);
$result_sets = $query->fetch_all(MYSQLI_ASSOC);
?>

<div class="row justify-content-center">
<h3 style="text-align:center"> Local Government Summed Total Result  </h3>
<div class="col-4">

<select class="form-select form-select-lg mb-3 local-government"  aria-label=".form-select-lg example">
  <option value ="">Select LGA</option>
    <?php foreach($result_sets as $result){?>
<option value="<?php echo $result['uniqueid']?>"><?php echo $result['lga_name']?></option>
    <?php }?>
  
</select>

</div>
<div class="col-12"></div>
<div class="col-8">
    <div class="table-responsive">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>LGA Id</th> 
            <th>PU Name </th>
            <th>Party Name</th>
            <th>Score</th>
        </tr>
        </thead>

        <tbody id="totalPUResult">

    
        </tbody>
        
    </table>
    </div>

</div>

</div>


<script>
function selector(el){
    return document.querySelector(el);
}
const url = "<?php echo $url?>";

let lga= selector(".local-government");
lga.addEventListener("change",function(){

  const id= lga.value;

  //alert(id);
  
  fetch(url+"/views/individual_pu_result_query.php?id="+id )
  .then(response => response.json())
  .then( data => {
    console.log(data);

    let tbrow="";
    let count = data.length;
    for(let i=0 ; i<count; i++){
        tbrow+=`<tr><td>${data[i]['lga_id']}</td><td>${data[i]['polling_unit_name']}</td><td>${data[i]['party_abbreviation']}</td><td>${data[i]['party_score']}</td></tr>`;
    }
        selector("#totalPUResult").innerHTML=tbrow;
  })
  .catch( error => console.log(error));

})

//lga_id,polling_unit_name , party_abbreviation ,party_score
</script>
