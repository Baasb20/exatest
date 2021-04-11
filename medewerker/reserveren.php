<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Add winkel</h1>

        <?php 
            
            Session_start();
            include '../database/DB.php';
                
            
            $db = new database();            
            $eten1= $db->select("SELECT eten FROM eten", []);

            $columns = array_keys($eten1[0]); 
            $row_data = array_values($eten1);

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $naam = $_POST["naam"]; 
                $adres = $_POST["adres"];
                $plaats = $_POST["plaats"];
                $postcode = $_POST["postcode"];
                $telefoon = $_POST["telefoon"];
                $eten = $_POST["eten_id"];
            
                $sql = "INSERT INTO reserveren (id, naam, adres, plaats, postcode, telefoon, eten_id) VALUES (NULL, :naam, :adres, :plaats, :postcode, :telefoon, :eten_id)";

            
                $placeholder = [
                    'naam'=>$naam,
                    'adres'=>$adres,
                    'plaats'=>$plaats,
                    'postcode'=>$postcode,
                    'telefoon'=>$telefoon,
                    'eten_id'=>$eten
                ];

                
                $db -> add ($sql, $placeholder, 'medewerker.php');

            }
        ?>

        <form action="reserveren.php" method="post">
            <input type="text" name="naam" placeholder="naam" required>
            <input type="text" name="adres" placeholder="adres"required>
            <input type="text" name="plaats"placeholder="plaats"  required>
            <input type="text" name="postcode" placeholder="postcode" required>
            <input type="text" name="telefoon" placeholder="telefoon" required> 
            <input type="text" name="eten_id" placeholder="telefoon" required> 
            <select name = "eten_id">
                <?php
                    foreach($row_data as $rows){
                        echo "<tr>";
                        foreach($rows as $data){
                            echo "<option>$data</option>";
                        }
                    }
                ?> 
            </select><br>
            <input type="submit" value="Voeg winkel toe">
        </form>
    </body>
</html>