<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbName = "driverify";
    
    // $conn = new mysqli($servername, $username, $password, $dbName);
    
    // if($conn->connect_error){
    //     die("Connection failed: ". $conn->connect_error);
    
    // }
    
    // echo "Connected successfully <br/>";

    include 'DBConnector.php';
    
    $sql = "CREATE DATABASE driverify";
    if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    
    } else {
    echo "Error creating database: " . $conn->error;
    }
    

 
    // $sql = "CREATE TABLE Vehicle(
    // plateNumber VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
    // color CHAR(10),
    // manufacturer CHAR(20),
    // registrationDate DATE,
    // model VARCHAR(20),
    // yearProduced SMALLINT(4) UNSIGNED
    // CHECK (yearProduced >= 1000 and yearProduced <= 9999),
    // fuel CHAR(10) 

    // )";

    // $sql = "CREATE TABLE carOwner(
    //     ownerID VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
    //     bloodType CHAR(2),
    //     sex CHAR(1) NOT NULL,
    //     nationality CHAR(20) NOT NULL,
    //     ownerName VARCHAR(100) NOT NULL,
    //     weightInKG INT(3) UNSIGNED,
    //     heightInCM INT(5) UNSIGNED,
    //     ownerAddress VARCHAR(100) NOT NULL,
    //     dateOfBirth DATE NOT NULL,
    //     contactNumber INT(11) UNSIGNED NOT NULL UNIQUE

    // )";

// $sql = "CREATE TABLE carDriver(
//     driverID VARCHAR(10) NOT NULL UNIQUE PRIMARY KEY,
//     bloodType CHAR(2),
//     sex CHAR(1) NOT NULL,
//     nationality CHAR(20) NOT NULL,
//     driverName VARCHAR(100) NOT NULL,
//     weightInKG INT(3) UNSIGNED,
//     heightInCM INT(5) UNSIGNED,
//     driverAddress VARCHAR(100) NOT NULL,
//     dateOfBirth DATE NOT NULL,
//     contactNumber INT(11) UNSIGNED NOT NULL UNIQUE

// )";

// $sql = "CREATE TABLE LTO(
//     agencyCode VARCHAR(4) NOT NULL UNIQUE PRIMARY KEY,
//     agencyName VARCHAR(100) NOT NULL,
//     LTOaddress VARCHAR(1000) NOT NULL,
//     emailAddress VARCHAR(60),
//     contactNumber INT(20) UNSIGNED UNIQUE, 
//     startingHour VARCHAR(20) NOT NULL,
//     endingHour VARCHAR(20) NOT NULL,
//     noOfCarsRegistered BIGINT UNSIGNED NOT NULL 


// )";

// $sql = "CREATE TABLE driverLicense(
//     licenseNumber VARCHAR(11) NOT NULL UNIQUE PRIMARY KEY,
//     issueDate DATE NOT NULL,
//     expirationDate DATE NOT NULL
// )";

// $sql = "CREATE TABLE owns(
//     plateNumber VARCHAR(6) NOT NULL,
//     ownerID VARCHAR(6) NOT NULL,
//     purachaseDate DATE NOT NULL,
//     purchasePrice INT(10) UNSIGNED
//     -- foreign key(plateNumber) references Vehicle

// )";



// $sql = "CREATE TABLE history(
//     licenseNumber VARCHAR(11) NOT NULL,
//     plateNumber VARCHAR(6) NOT NULL,
//     noOfAccidents INT,
//     noOfApprehensions INT,
//     descriptionHistory VARCHAR(100000) NOT NULL,
//     dateHistory DATE,
//     DLCode VARCHAR(5) NOT NULL
// )";

// $sql = "ALTER TABLE history
// ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";

// $sql = "CREATE TABLE record(
//         agencyCode VARCHAR(4) NOT NULL,
//         licenseNumber VARCHAR(11) NOT NULL,
//         registrationDate DATE NOT NULL,
//         expiryDate DATE NOT NULL,
//         foreign key(agencyCode, licenseNumber) references LTO, driverLicense
    
//     )";

// $sql = "CREATE TABLE applies(
//         driverID VARCHAR(10) NOT NULL,
//         licenseNumber VARCHAR(11) NOT NULL,
//         applicationDate DATE NOT NULL,
//         applicationType VARCHAR(70) NOT NULL,
//         foreign key(driverID, licenseNumber) references carDriver, driverLicense
    
// )";

// $sql = "CREATE TABLE registration(
//     agencyCode VARCHAR(4) NOT NULL,
//     plateNumber VARCHAR(6) NOT NULL,
//     registrationDate DATE NOT NULL,
//     expiryDate DATE NOT NULL,
//     foreign key(agencyCode, plateNumber) references LTO, Vehicle

// )";

// $sql = "CREATE TABLE drive(
//     driverID VARCHAR(10) NOT NULL,
//     plateNumber VARCHAR(6) NOT NULL,
//     foreign key(driverID, plateNumber) references carDriver, Vehicle

// )";


// $insertLTO = "INSERT INTO LTO (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, staringHour, endingHour, noOfCarsRegistered)
// VALUES('0100', 'OPERATION DIVISION', 'AGUILA ROAD, CITY OF SAN FERNANDO, LA UNION', 'LTOR1OPERDIV@GMAIL.COM', '072-6070465', '8:00 AM', '5:00 PM');
// VALUES('0200', 'OPERATIONS DIVISION/NEW REGISTRATION UNIT', 'SAN GABRIEL VILLAGE, TUGUEGARAO CITY, CAGAYAN', 'NRUREGION02@GMAIL.COM', '(078) 8449370', '8:00 AM', '5:00 PM');
// VALUES('0300', 'OPERATIONS DIVISION', 'GOVT CENTER, BRGY. MAIMPIS, CITY OF SAN FERNANDO, PAMPANGA', 'LTOREGION3.OPERATIONSDIVISION@GMAIL.COM', '(045) 455-1768', '8:00 AM', '5:00 PM');
// VALUES('0400', 'OPERATIONS DIVISION', 'OLD CITY HALL COMP. INT B. MORADA AVE, LIPA CITY, BATANGAS', '0400OPERATIONS4A@GMAIL.COM', '(043) 756-1438', '8:00 AM', '5:00 PM');
// VALUES('0402', 'OPERATIONS DIVISION', 'BRGY. SAN RAFAEL, CALAPAN CITY, ORIENTAL MINDORO', 'LTOMIMAROPAOPERATIONSDIVISION@GMAIL.COM', '09171195006', '8:00 AM', '5:00 PM');
// VALUES('0501', 'OPERATIONS DIVISION', 'REGIONAL GOVERNMENT CENTER, RAWIS, LEGAZPI CITY, ALBAY', 'LTOR5OPERATIONS@GMAIL.COM', '09537711766', '8:00 AM', '5:00 PM');
// VALUES('0600', 'OPERATIONS DIVISION', 'BRGY. QUINTIN SALAS, JARO, ILOILO CITY', 'AD_SACRAMENTO@YAHOO.COM', '(033) 337 2427', '8:00 AM', '5:00 PM');
// VALUES('0700', 'OPERATIONS DIVISION', 'NATALIO BACALSO AVENUE, CEBU CITY', 'LTO7OPERATIONSDIV@GMAIL.COM', '(032) 413 5294', '8:00 AM', '5:00 PM');
// VALUES('0800', 'OPERATIONS DIVISION', 'SGOVERNMENT CENTER, CANDAHUG, PALO, LEYTE', 'SLLGERNALE@GMAIL.COM', '(053)888-4951	', '8:00 AM', '5:00 PM');
// VALUES('0900', 'OPERATIONS DIVISION', 'REGIONAL OFFICE-IX, PUROK RIVERSIDE, BALANGASAN, PAGADIAN CITY', 'OKJALALUDDIN@GMAIL.COM', '09165327095	', '8:00 AM', '5:00 PM');
// VALUES('1000', 'OPERATIONS DIVISION', 'MVIS COMPOUND, ZONE 7, BULUA, CAGAYAN DE ORO CITY', 'OPERATIONSDIVISIONR10@GMAIL.COM', '(088) 880 1423', '8:00 AM', '5:00 PM');
// VALUES('1100', 'OPERATIONS DIVISION', 'LTO REGIONAL OFFICE XI, MVIS COMPOUND, QUIMPO BOULEVARD, TALAMO, DAVAO CITY', 'OPTNSLTOXI@GMAIL.COM', '(082) 296-0985', '8:00 AM', '5:00 PM');
// VALUES('1200', 'OPERATIONS DIVISION', 'LTO 12 REGIONAL OFFICE YELLOW BELL, BRGY. STA. CRUZ, KORONADAL CITY, SOUTH COTABATO', 'LTOR12OPERATIONSDIVISION@GMAIL.COM', 'N/A', '8:00 AM', '5:00 PM');
// VALUES('1300 ', 'OPERATIONS DIVISION', 'LTO-NCR BUILDING, 2ND FLOOR 20 G. ARANETA AVE., QUEZON CITY', 'LTONCROPDWEST2019@GMAIL.COM', '09058956522', '8:00 AM', '5:00 PM' );
// VALUES('1401 ', 'LEGAL & TECHNICAL (OPERATIONS) DIVISION', '2ND FLOOR POST OFFICE BUILDING, POST OFFICE LOOP, UPPER SESSION ROAD, BAGUIO CITY', 'DOTRCAROFFICIAL@GMAIL.COM', '074 423 1662', '8:00 AM', '5:00 PM' );
// VALUES('1500 ', 'OPERATIONS DIVISION', 'J. ROSALES AVENUE, BUTUAN CITY', 'NAA_LAW@YAHOO.COM', '(085) 8171649', '8:00 AM', '5:00 PM' );



 if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
    
    } else {
    echo "Error creating database: " . $conn->error;
    }

// ";





























?>