<?php 
include "includes/config.php";
?>
<!doctype html>
<html>
<head>
<title>ELECTION RESULT </title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php 
    $array_of_pages = ["individual_pu_result.php","total_pu_result.php"];

    if(array_key_exists("page",$_GET)){
        $page = $_GET ['page'].".php";

        if(!in_array($page, $array_of_pages)){
            $page="individual_pu_result.php";
        }      
    }

    else{
        $page="individual_pu_result.php"; 
    }


    include "views/header.php";

    echo "<div class='container-fluid' style='margin-top:30px;'>";

    include  "views/".$page;

    echo "</div>";

    ?>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

