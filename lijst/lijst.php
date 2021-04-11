<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bestelling Lijst</h1>
    <?php
    
        include '../database/DB.php';
        $db = new database();
    
        $vestigingen = $db->select("SELECT DISTINCT vestigingsplaats FROM winkel", []); 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $locatie = $_POST['locatie'];

          $winkels = $db->winkelvestiging($locatie);
          if(isset($winkels)){
            foreach($winkels as $winkel){
                echo '<br>  <b>Name</b> ' . $winkel['winkelnaam'] . ' <b>Location</b> ' . $winkel['vestigingsplaats'] . "<br>";
            }

          } else{
              echo 'Wrong name in winkelnaam';
          }
         
        }else{
            echo 'ERROR';
        }
    ?>
    <form action="lijst.php" method="post">
    <h3>Select city</h3>
        <select name="locatie" id="locatie">
            <?php foreach($vestigingen as $vestiging){ ?>
                <option value="<?php echo $vestiging['vestigingsplaats']?>">
                    <?php echo $vestiging['vestigingsplaats'] ?>
                </option>    
            <?php } ?>
        </select>
        <button type="submit">submit</button> 
    </form>
</body>