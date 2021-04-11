<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Mijn gegevens</h1>
        <?php  
            include '../database/DB.php';
                $db = new database();
                sesssion_start();
                print_r($_SESSION);
                $klant = $db->select("SELECT id FROM klant WHERE gebruikersnaam = '".$_SESSION['gebruikersnaam']."'");

                if(count($reserve) > 0){
                    
                    $columns = array_keys($reserve[0]); 

                    
                    $row_data = array_values($reserve);
        ?>
        <table border = 1>
            <tr>
                <?php
                    foreach($columns as $column){
                        echo "<th><strong>$column</strong></th>";
                    }
                ?>
            <th colspan="2">edit</th>
            </tr>

            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";
                    }
            ?>

                <td>
                <a href="klantgegevens.php?klant_id=<?php echo $rows['id']?>">edit</a>
                </td>
                </tr>

            <?php 
                } 
            ?>


        </table><br>
            <br>
        <?php }else{
            echo "No data available";}
            ?>
        
        <button>
            <a href="klant.php">Terug</a>
        </button>
    </body>
</html>