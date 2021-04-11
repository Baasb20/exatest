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
                
                // het hele table reserveren wordt geslecteerd.
                $reserve = $db->select("SELECT * FROM medewerker", []);


                if(isset($_POST['export'])){
                    $filename = "user_data_export.xls";
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    $print_header = false;
    
                    $medewerker = $db->excel(NULL);
                    if(!empty($medewerker)){
                        foreach($medewerker as $row){
                            if(!$print_header){
                                echo implode("\t", array_keys($row)) ."\n";
                                $print_header=true;
                                echo "<br>";
                            }
                            echo implode("\t", array_values($row)) ."\n";
                        }
                    }
                    exit;
                }
                
                if(count ($reserve) > 0){
                    // hier komen bijvoorbeeld id , naam, adres 
                    $columns = array_keys($reserve[0]); 

                    // alle gegevens in je database worden hier gezet
                    $row_data = array_values($reserve)
        ?>
        <table border = 1>
            <tr>
                <?php
                    foreach($columns as $column){
                        echo "<th><strong>$column</strong></th>";
                    }
                ?>
            <th colspan="2">edit or delete</th>
            </tr>

            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";
                    }
            ?>

                <td>
                <a href="edit_reservering.php?reservering_id=<?php echo $rows['id']?>">edit</a>
                <a href="delete_reservering.php?id=<?php echo $rows['id']?>">delete</a>
                </td>
                </tr>

            <?php 
                } 
            ?>

            <form action='overzicht_medewerker.php' method='POST'>
                <input type='submit' name='export' value='Export to excel file' />
            </form>
                
            <?php 
                }  else{
                echo "No data available";}
            ?>
        </table>
        <button>
            <a href="medewerker.php">Terug</a>
        </button>
    </body>
</html>