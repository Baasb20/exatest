<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Overzicht medewerker</h1>
        <?php  
            include '../database/DB.php';
            $db = new database();
            
            //!!!!!!!!!!!!!!!!!!! MOET HIER VERD NOG AAN WERKEN !!!!!!!!!!!!!!!!!!
            echo "er zijn";
            $medewerker = $db->select("SELECT COUNT(*) FROM bestelling WHERE `afgehaald` = 'nee' HAVING COUNT(*)", []);
            foreach ($medewerker as $key =>$value) {
                echo "$key: $value";
            };
            echo " opgehaald";

            if(count ($medewerker) > 0){
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

            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";
                    }
            ?>

            </tr>

            <?php 
                } 
            ?>
                
            <?php 
                }  else{
                echo "No data available";}
            ?>
        </table>
    </body>
</html>
            
