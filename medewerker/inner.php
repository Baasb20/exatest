<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
    <body>
        <div class="topnav">
            <a href="overzicht_medewerker.php">Overzicht medewerker</a>
            <a href="overzicht_artikel.php">Overzicht artikel</a>
            <a href="overzicht_winkel.php">Overzicht winkel</a>
            <a href="overzicht_klant.php">Overzicht klant</a>
            <div class="Logout">
                <a class="active" href="../logout.php">Logout</a>
            </div>
        </div>
        <div> 
            <?php  
                include '../database/DB.php';
                    $db = new database();
                    
                    // het hele table wordt geslecteerd.
                    $medewerker = $db->select("SELECT reserveren.naam, eten.eten FROM reserveren INNER JOIN eten ON reserveren.id = eten.id", []);
                    
                    // hier komen bijvoorbeeld id , naam, adres 
                    $columns = array_keys($medewerker[0]); 

                    // alle gegevens in je database worden hier gezet
                    $row_data = array_values($medewerker)
            ?>
            <table>
                <tr>
                    <?php
                        foreach($columns as $column){
                            echo "<th><strong>$column</strong></th>";
                        }
                    ?>
                </tr>
                <td>        
                    <?php  
                        foreach($row_data as $rows){
                            echo "<tr>";
                            foreach($rows as $data){
                                echo "<td>$data</td>";
                            }
                        }
                    ?>
                </td>
            </table>
        </div> 
    </body>
</html>

<!-- //<?php
include "nav.php";
include "database.php";
//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT  product.id, product.product, product.prijs, fabriek.fabriek FROM product INNER JOIN fabriek ON product.fabriek_id=fabriek.id",[]);

$columns = array_keys($sql[0]);
$row_data = array_values($sql);
?>
<head>
    <title>JOIN</title>
</head>
<table border 1px solid>
<tr>
    <?php
        foreach ($columns as $column) {
          echo "<th><strong> $column </strong></th>";
        }
    foreach($row_data as $rows){
              echo "<tr>";
    foreach($rows as $data){
       echo "<td>$data</td>";
    }?>
  </tr>
<?php } ?>
</tr>
</table> -->



<?php
include "nav.php";
include "database.php";

//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT  product.product, product.prijs, fabriek.fabriek, fabriek.locatie FROM product INNER JOIN fabriek ON product.fabriek_id=fabriek.id ORDER BY fabriek_id",[]);

$columns = array_keys($sql[0]);
$row_data = array_values($sql);
?>
<head>
    <title>JOIN</title>
</head>
<table class = "join" border 1px solid>
<tr>
    <?php
        foreach ($columns as $column) {
          echo "<th><strong> $column </strong></th>";
        }
    foreach($row_data as $rows){
              echo "<tr>";
    foreach($rows as $data){
       echo "<td>$data</td>";
    }?>
  </tr>
<?php } ?>
</tr>
</table>