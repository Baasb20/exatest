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
                    $medewerker = $db->select("SELECT * FROM medewerker", []);
                    
                    if(count ($medewerker) > 0){
                        // hier komen bijvoorbeeld id , naam, adres 
                        $columns = array_keys($medewerker[0]); 

                        // alle gegevens in je database worden hier gezet
                        $row_data = array_values($medewerker)
            ?>
            <table>
                <?php 
                    if(isset($_POST['export'])){
                        $filename = "medewerker_overzicht.xls";
                        header("Content-Type: application/vnd.ms-excel");
                        header("Content-Disposition: attachment; filename=\"$filename\"");
                        $print_header = false;
                    
                        $medewerker = $db->excel(NULL);
                        if(!empty($medewerker)){
                            foreach($medewerker as $row){
                                if(!$print_header){
                                    echo implode("\t", array_keys($row)) ."\n";
                                    $print_header=true;
                    
                                }
                                echo implode("\t", array_values($row)) ."\n";
                            }
                        }
                        exit;
                    }                
                ?>
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
                    <a href="edit_mede$medewerkerring.php?mede$medewerkerring_id=<?php echo $rows['id']?>">edit</a>
                    <a href="delete_mede$medewerkerring.php?id=<?php echo $rows['id']?>">delete</a>
                    </td>
                    </tr>

                <?php 
                    } 
                ?>
                    
                <?php 
                    }  else{
                    echo "No data available";}
                ?>
            </table>
            <form action='overzicht_medewerker.php' method='POST'>
                    <input type='submit' name='export' value='Export to excel file' />
            </form>
            <button>
                <a href="medewerker.php">Terug</a>
            </button>
        </div> 
    </body>
</html>