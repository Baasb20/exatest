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

CREATE TABLE reserveren(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(250) UNQIQNOT NULL,
    adres VARCHAR(250) NOT NULL,
    plaats VARCHAR(250) NOT NULL,
    postcode VARCHAR(250) NOT NULL,
    telefoon VARCHAR(250) NOT NULL,
    eten VARCHAR()NOT NULL
    PRIMARY KEY(id),
);
CREATE TABLE reserveren(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(250) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    plaats VARCHAR(250) NOT NULL,
    postcode VARCHAR(250) NOT NULL,
    telefoon VARCHAR(250) NOT NULL,
    eten_id INT NOT NULL,
    FOREIGN KEY(eten_id) REFERENCES eten(id),
    PRIMARY KEY(id)
);

CREATE TABLE reserveren(
    id INT NOT NULL AUTO_INCREMENT,
    naam VARCHAR(250) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    plaats VARCHAR(250) NOT NULL,
    postcode VARCHAR(250) NOT NULL,
    telefoon VARCHAR(250) NOT NULL,
    eten_id INT NOT NULL,
    FOREIGN KEY(eten_id) REFERENCES eten(id),
    PRIMARY KEY(id)
);

-- INNER JOIN 2 TABLE
CREATE TABLE drank(
    id INT NOT NULL AUTO_INCREMENT,
    dranknaam VARCHAR(250) NOT NULL,
    prijs DECIMAL (5,2),
    PRIMARY KEY(id)

);

INSERT INTO `drank` (`id`, `dranknaam`, `prijs`) VALUES (NULL, 'Cola', '3,50'), (NULL, 'Fanta', '2,60'), (NULL, 'Sprite', '2,50'), (NULL, 'pepsi', '0.69'), (NULL, 'Water', '1,,01');


CREATE TABLE eten(
    id INT NOT NULL AUTO_INCREMENT,
    etennaam VARCHAR(250) NOT NULL,
    prijs DECIMAL (5,2),
    PRIMARY KEY(id)
);

INSERT INTO `eten` (`id`, `etennaam`, `prijs`) VALUES (NULL, 'Pizza', '12.12'), (NULL, 'Hamburger', '10,00'), (NULL, 'Rijst', ''), (NULL, 'Spaghetti', '15,50'), (NULL, 'Shoarma', '14,45');


CREATE TABLE bar (
    id INT NOT NULL AUTO_INCREMENT,
    aantal INT (11) NOT NULL,
    totaal DECIMAL (5,2), 
    drank_id INT NOT NULL,
    FOREIGN KEY(drank_id) REFERENCES drank(id),
    PRIMARY KEY(id)
);

INSERT INTO `bar` (`id`, `aantal`, `totaal`, `drank_id`) VALUES (NULL, '3', '6,00', '3');

CREATE TABLE keuken (
    id INT NOT NULL AUTO_INCREMENT,
    aantal INT (11) NOT NULL,
    totaal DECIMAL (5,2), 
    eten_id INT NOT NULL,
    FOREIGN KEY(eten_id) REFERENCES eten(id),
    PRIMARY KEY(id)
);

INSERT INTO `keuken` (`id`, `aantal`, `totaal`, `eten_id`) VALUES (NULL, '3', '36,36', '1'), (NULL, '2', '32,00', '3');



-------!!!!!!! GEBRUIK OM 2 TABLE TE BEREKENNNNNNNNNNNNNNNN
SELECT drank.dranknaam, bar.aantal, bar.totaal, eten.etennaam, keuken.aantal, keuken.totaal, bar.totaal+keuken.totaal AS totaal 
FROM bar 
INNER JOIN keuken ON keuken.id = bar.id 
INNER JOIN eten ON eten.id = keuken.eten_id 
INNER JOIN drank ON drank.id = bar.drank_id


-------------!!!!!!!!!!!!! GEBRUIK OM DE AANTAL  X DE PRIJS TE BEREKEN!!!!!!!!!!!!!!!!!!!!!!!!!!
SELECT bar.aantal, drank.dranknaam, drank.prijs*bar.aantal AS totaal 
FROM bar 
INNER JOIN drank ON drank.id = bar.drank_id




--Inner joins opdracht
--opdracht 1

SELECT Orders.OrderID, Orders.OrderDate, Customers.CustomerName
FROM Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;

--opdracht 2

SELECT Orders.OrderID, Employees.LastName, Employees.FirstName, Employees.BirthDate
FROM Orders
INNER JOIN Employees ON Orders.EmployeeID = Employees.EmployeeID;

--opdracht 3
SELECT Orders.OrderID, Orders.OrderDate, Customers.CustomerName, Customers.Country, Customers.City, Shippers.ShipperName
FROM Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID
INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID