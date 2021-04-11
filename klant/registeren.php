<?php

session_start();
include "../database/DB.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $voorletters = $_POST['voorletters'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $geboortedatum = $_POST['geboortedatum'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "INSERT INTO klant
        (voorletters, tussenvoegsel, achternaam, adres, postcode, woonplaats, geboortedatum, gebruikersnaam, wachtwoord)
        VALUES
        (:voorletters, :tussenvoegsel, :achternaam, :adres, :postcode, :woonplaats, :geboortedatum, :gebruikersnaam, :wachtwoord)";

    $placeholder = [
        'voorletters'=>$voorletters,
        'tussenvoegsel'=>$tussenvoegsel,
        'achternaam'=>$achternaam,
        'adres'=>$adres,
        'postcode'=>$postcode,
        'woonplaats'=>$woonplaats,
        'geboortedatum'=>$geboortedatum,
        'gebruikersnaam'=>$gebruikersnaam,
        'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT)
    ];

    $db = new database();
    $db->createKlant($sql, $placeholder, 'klant.php');

}


?>
<html>
    <body>
        <h1>Sign Up</h1>
        <form method="post" action="registeren.php" accept-charset="UTF-8">
            <input type="text" name="voorletters" placeholder="Vul in uw voorletters" required><br>
            <input type="text" name="tussenvoegsel" placeholder="Vul in uw tussenvoegsel"><br>
            <input type="text" name="achternaam" placeholder="Vul in uw achternaam" required><br>
            <input type="text" name="adres" placeholder="Vul in uw adres" required><br>
            <input type="text" name="postcode" placeholder="Vul in uw postcode" required><br>
            <input type="text" name="woonplaats" placeholder="Vul in uw woonplaats" required><br>
            <input type="text" name="geboortedatum" placeholder="Vul in uw geboortedatum" required><br>
            <input type="text" name="gebruikersnaam" placeholder="Vul in uw gebruikersnaam" required><br>
            <input type="password" name="wachtwoord" placeholder="Vul in uw wachtwoord" required><br>
            <input type="password" name="wachtwoord-herhaling" placeholder="Vul in uw wachtwoord nogmaals " required><br>
            <input type="submit" name="submit" value="submit" >
        </form>
    </body>
</html>