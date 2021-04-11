CREATE DATABASE schoen;

USE schoen;

CREATE TABLE medewerker(
    id INT NOT NULL AUTO_INCREMENT,
    voorletter VARCHAR(250) NOT NULL,
    tussenvoegsel VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE klant(
    id INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(250) NOT NULL,
    tussenvoegsel VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    postcode VARCHAR(250) NOT NULL,
    woonplaats VARCHAR(250) NOT NULL,
    geboortedatum DATE,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE winkel(
    id INT NOT NULL AUTO_INCREMENT,
    winkelnaam VARCHAR(250) NOT NULL,
    winkeladres VARCHAR(250) NOT NULL,
    winkelpostcode VARCHAR(250) NOT NULL,
    vestigingsplaats VARCHAR(250) NOT NULL,
    telefoonnummer VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
);



CREATE TABLE artikel(
    id INT NOT NULL AUTO_INCREMENT,
    artikel VARCHAR(250) NOT NULL,
    prijs DECIMAL(60) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE bestelling(
    id INT NOT NULL AUTO_INCREMENT,
    aantal VARCHAR(250) NOT NULL,
    afgehaald VARCHAR(250) NOT NULL,
    datum DATE,
    klant_id INT NOT NULL,
    artikel_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(klant_id) REFERENCES klant(id),
    FOREIGN KEY(artikel_id) REFERENCES artikel(id),
);

