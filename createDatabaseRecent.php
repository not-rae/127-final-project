<?php
    
    include 'DBConnector.php';
    
    // $sql = "CREATE DATABASE driverify";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Database created successfully";
    
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

// $sql = "CREATE TABLE LTO(
//     agencyCode VARCHAR(4) NOT NULL UNIQUE PRIMARY KEY,
//     agencyName VARCHAR(100) NOT NULL,
//     LTOaddress VARCHAR(1000) NOT NULL,
//     emailAddress VARCHAR(60),
//     contactNumber VARCHAR(20) UNIQUE, 
//     startingHour VARCHAR(20) NOT NULL,
//     endingHour VARCHAR(20) NOT NULL,
//     noOfCarsRegistered BIGINT UNSIGNED


// )";
    

// $sql = "CREATE TABLE carOwner(
//         ownerID VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
//         ownerName VARCHAR(100) NOT NULL,
//         dateOfBirth DATE NOT NULL,
//         sex CHAR(5) NOT NULL,
//         bloodType CHAR(5) NOT NULL,
//         contactNumber VARCHAR(11) NOT NULL UNIQUE,
//         nationality CHAR(20) NOT NULL,
//         heightInCM INT(5) UNSIGNED,
//         weightInKG INT(3) UNSIGNED,  
//         ownerAddress VARCHAR(100) NOT NULL,
//         noOfVehiclesOwned INT(6) UNSIGNED NOT NULL

// )";

// $sql = "CREATE TABLE carDriver(
//     driverID VARCHAR(10) NOT NULL UNIQUE PRIMARY KEY,
//     driverName VARCHAR(100) NOT NULL,
//     dateOfBirth DATE NOT NULL,
//     sex CHAR(5) NOT NULL,
//     bloodType CHAR(5) NOT NULL,
//     contactNumber VARCHAR(11) NOT NULL UNIQUE,
//     nationality CHAR(20) NOT NULL,
//     heightInCM INT(5) UNSIGNED,
//     weightInKG INT(3) UNSIGNED,
//     driverAddress VARCHAR(100) NOT NULL
    
    

// )";

// $sql = "CREATE TABLE Vehicle(
//     plateNumber VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
//     ownerID VARCHAR(6) NOT NULL,
//     ownerNameV VARCHAR(100) NOT NULL,
//     driverID VARCHAR(10) NOT NULL,
//     driverNameV VARCHAR(100) NOT NULL,
//     registrationDate DATE NOT NULL,
//     expirationDate DATE NOT NULL,
//     manufacturer CHAR(20) NOT NULL,
//     model VARCHAR(20) NOT NULL,
//     color CHAR(10) NOT NULL,
//     yearProduced SMALLINT(4) UNSIGNED NOT NULL
//     CHECK (yearProduced >= 1000 and yearProduced <= 9999),
//     fuel CHAR(10) NOT NULL

// )";

$sql = "ALTER TABLE vehicle
ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

// $sql = "ALTER TABLE vehicle
// ADD FOREIGN KEY (ownerID) REFERENCES carOwner(ownerID);";



// $sql = "CREATE TABLE driverLicense(
//     driverID VARCHAR(10) NOT NULL,
//     driverNameDL VARCHAR(100) NOT NULL,
//     licenseNumber VARCHAR(11) NOT NULL UNIQUE PRIMARY KEY,
//     agencyCode VARCHAR(4) NOT NULL,
//     issueDate DATE NOT NULL,
//     expirationDate DATE NOT NULL,
//     conditionCode VARCHAR(10) NOT NULL,
//     DLCode VARCHAR(5) NOT NULL
// )";

// $sql = "ALTER TABLE driverLicense
// ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

// $sql = "ALTER TABLE driverLicense
// ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

// $sql = "CREATE TABLE history(
//     plateNumber VARCHAR(6) NOT NULL,
//     ownerNameH VARCHAR(100) NOT NULL,
//     driverNameH VARCHAR(100) NOT NULL, 
//     licenseNumber VARCHAR(11) NOT NULL,
//     agencyCode VARCHAR(4) NOT NULL,
//     noOfViolations INT NOT NULL,
//     recentViolationDate DATE,
//     DLCode VARCHAR(5) NOT NULL
// )";

// $sql = "ALTER TABLE history
// ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";

// $sql = "ALTER TABLE history
// ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";

$sql = "ALTER TABLE history
ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";


// $sql = "CREATE TABLE owns(
//     plateNumber VARCHAR(6) NOT NULL,
//     ownerID VARCHAR(6) NOT NULL,
//     purachaseDate DATE NOT NULL,
//     purchasePrice INT(10) UNSIGNED

// )";

// $sql = "ALTER TABLE owns
// ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";

// $sql = "CREATE TABLE record(
//         agencyCode VARCHAR(4) NOT NULL,
//         licenseNumber VARCHAR(11) NOT NULL,
//         registrationDate DATE NOT NULL,
//         expiryDate DATE NOT NULL
//         -- foreign key(agencyCode, licenseNumber) references LTO, driverLicense
    
// )";

// $sql = "ALTER TABLE record
// ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

// $sql = "ALTER TABLE record
// ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";


// $sql = "CREATE TABLE applies(
//         driverID VARCHAR(10) NOT NULL,
//         licenseNumber VARCHAR(11) NOT NULL,
//         applicationDate DATE NOT NULL,
//         applicationType VARCHAR(70) NOT NULL
//         -- foreign key(driverID, licenseNumber) references carDriver, driverLicense
    
// )";

// $sql = "ALTER TABLE applies
// ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

// $sql = "ALTER TABLE applies
// ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";

// $sql = "CREATE TABLE registration(
//     agencyCode VARCHAR(4) NOT NULL,
//     plateNumber VARCHAR(6) NOT NULL,
//     registrationDate DATE NOT NULL,
//     expiryDate DATE NOT NULL
//     -- foreign key(agencyCode, plateNumber) references LTO, Vehicle

// )";

// $sql = "ALTER TABLE registration
// ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

// $sql = "ALTER TABLE registration
// ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";


// $sql = "CREATE TABLE drive(
//     driverID VARCHAR(10) NOT NULL,
//     plateNumber VARCHAR(6) NOT NULL


// )";

// $sql = "ALTER TABLE drive
// ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

// $sql = "ALTER TABLE drive
// ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";









 if ($conn->query($sql) === TRUE) {
    echo "OKS 8";
    
    } else {
    echo "Error creating database: " . $conn->error;
    }
?>
