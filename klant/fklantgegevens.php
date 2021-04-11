<html>
    <body>
    <h1>Edit</h1>
        <?php
            
            include "../database/DB.php";
            $db=new database();

            if(isset($_GET['klant_id'])){
                $winkel = $db->select("SELECT * FROM klant WHERE id = :klant_id", ['klant_id'=>$_GET['klant_id']]); 
            }
            
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $sql = "UPDATE klant SET voorletters=:voorletters, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, adres=:adres, postcode=:postcode, woonplaats=:woonplaats, geboortedatum=:geboortedatum, gebruikersnaam=:gebruikersnaam, wachtwoord=:wachtwoord
                        WHERE id=:klant_id";
            
            
                $placeholders = [
                    'klant_id'=>$_POST['klant_id'],
                    'voorletters'=>$_POST['voorletters'],
                    'tussenvoegsel'=>$_POST['tussenvoegsel'],
                    'achternaam'=>$_POST['achternaam'],
                    'adres'=>$_POST['adres'],
                    'postcode'=>$_POST['postcode'],
                    'woonplaats'=>$_POST['woonplaats'],
                    'geboortedatum'=>$_POST['geboortedatum'],
                    'gebruikersnaam'=>$_POST['gebruikersnaam'],
                    'gebruikersnaam'=>$_POST['wachtwoord']
                ];
            
                print_r($placeholders);
                $db->update_and_delete($sql, $placeholders, "klantoverzicht.php");
            }
        ?>

        <form action="klantgegevens.php" method="post">
            <input type="hidden" name="klant_id" value="<?php echo isset($_GET['klant_id']) ? $_GET['klant_id'] : '' ?>">
            <input type="text" name="voorletters" placeholder="voorletters" value="<?php echo isset($winkel) ? $winkel[0]['voorletters'] : ''?>">
            <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo isset($winkel) ? $winkel[0]['tussenvoegsel'] : ''?>">
            <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo isset($winkel) ? $winkel[0]['achternaam'] : ''?>">
            <input type="text" name="adres" placeholder="adres" value="<?php echo isset($winkel) ? $winkel[0]['adres'] : ''?>">
            <input type="text" name="postcode" placeholder="postcode" value="<?php echo isset($winkel) ? $winkel[0]['postcode'] : ''?>">
            <input type="text" name="woonplaats" placeholder="woonplaats" value="<?php echo isset($winkel) ? $winkel[0]['woonplaats'] : ''?>">
            <input type="text" name="geboortedatum" placeholder="geboortedatum" value="<?php echo isset($winkel) ? $winkel[0]['geboortedatum'] : ''?>">
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" value="<?php echo isset($winkel) ? $winkel[0]['gebruikersnaam'] : ''?>">
            <input type="password" name="wachtwoord" placeholder="wachtwoord" value="<?php echo isset($winkel) ? $winkel[0]['wachtwoord'] : ''?>">
            <input type="submit" value="Edit">
        </form>
    </body>
</html>