<?php
    
    include 'DBConnector.php';
    
    // $sql = "CREATE DATABASE driverify";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Database created successfully";
    
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // create LTO table
    $sql_LTO = "CREATE TABLE LTO(
        agencyCode VARCHAR(4) NOT NULL UNIQUE PRIMARY KEY,
        agencyName VARCHAR(100) NOT NULL,
        LTOaddress VARCHAR(1000) NOT NULL,
        emailAddress VARCHAR(60),
        contactNumber VARCHAR(20) UNIQUE, 
        startingHour VARCHAR(20) NOT NULL,
        endingHour VARCHAR(20) NOT NULL,
        noOfDriversRegistered BIGINT UNSIGNED
    )";

    if ($conn->query($sql_LTO) === TRUE) {
        echo "OKS LTO";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }
        
    // create carOwner table
    $sql_carOwner = "CREATE TABLE carOwner(
            ownerID VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
            ownerName VARCHAR(100) NOT NULL,
            dateOfBirth DATE NOT NULL,
            sex CHAR(5) NOT NULL,
            bloodType CHAR(5) NOT NULL,
            contactNumber VARCHAR(11) NOT NULL UNIQUE,
            nationality CHAR(20) NOT NULL,
            heightInCM INT(5) UNSIGNED,
            weightInKG INT(3) UNSIGNED,  
            ownerAddress VARCHAR(100) NOT NULL
    )";

    if ($conn->query($sql_carOwner) === TRUE) {
        echo "OKS carOwner";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // create carDriver table
    $sql_carDriver = "CREATE TABLE carDriver(
        driverID VARCHAR(10) NOT NULL UNIQUE PRIMARY KEY,
        driverName VARCHAR(100) NOT NULL,
        dateOfBirth DATE NOT NULL,
        sex CHAR(5) NOT NULL,
        bloodType CHAR(5) NOT NULL,
        contactNumber VARCHAR(11) NOT NULL UNIQUE,
        nationality CHAR(20) NOT NULL,
        heightInCM INT(5) UNSIGNED,
        weightInKG INT(3) UNSIGNED,
        driverAddress VARCHAR(100) NOT NULL
    )";

    if ($conn->query($sql_carDriver) === TRUE) {
        echo "OKS carDriver";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // create vehicle table
    $sql_vehicle = "CREATE TABLE Vehicle(
        plateNumber VARCHAR(6) NOT NULL UNIQUE PRIMARY KEY,
        ownerID VARCHAR(6) NOT NULL,
        ownerNameV VARCHAR(100) NOT NULL,
        driverID VARCHAR(10) NOT NULL,
        driverNameV VARCHAR(100) NOT NULL,
        registrationDate DATE NOT NULL,
        expirationDate DATE NOT NULL,
        manufacturer CHAR(20) NOT NULL,
        model VARCHAR(20) NOT NULL,
        color CHAR(10) NOT NULL,
        yearProduced SMALLINT(4) UNSIGNED NOT NULL
        CHECK (yearProduced >= 1000 and yearProduced <= 9999),
        fuel CHAR(10) NOT NULL
    )";

    if ($conn->query($sql_vehicle) === TRUE) {
        echo "OKS vehicle";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_driverIDV = "ALTER TABLE vehicle
    ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

    if ($conn->query($sql_driverIDV) === TRUE) {
        echo "OKS vehicle 1";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_ownerIDV = "ALTER TABLE vehicle
    ADD FOREIGN KEY (ownerID) REFERENCES carOwner(ownerID);";

    if ($conn->query($sql_driverIDV) === TRUE) {
        echo "OKS vehicle 2";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_dropV = "ALTER TABLE vehicle DROP FOREIGN KEY vehicle_ibfk_2;";

    if ($conn->query($sql_driverIDV) === TRUE) {
        echo "OKS vehicle 3";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // create driverLicense table
    $sql_driverLicense = "CREATE TABLE driverLicense(
        driverID VARCHAR(10) NOT NULL,
        driverNameDL VARCHAR(100) NOT NULL,
        licenseNumber VARCHAR(11) NOT NULL UNIQUE PRIMARY KEY,
        agencyCode VARCHAR(4) NOT NULL,
        issueDate DATE NOT NULL,
        expirationDate DATE NOT NULL,
        conditionCode VARCHAR(10) NOT NULL,
        DLCode VARCHAR(5) NOT NULL
    )";

    if ($conn->query($sql_driverLicense) === TRUE) {
        echo "OKS driverLicense";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_driverIDDL = "ALTER TABLE driverLicense
    ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

    if ($conn->query($sql_driverIDDL) === TRUE) {
        echo "OKS driverLicense 1";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_AC = "ALTER TABLE driverLicense
    ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

    if ($conn->query($sql_AC) === TRUE) {
        echo "OKS driverLicense 2";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // create history table
    $sql_history = "CREATE TABLE history(
        plateNumber VARCHAR(6) NOT NULL UNIQUE,
        ownerID VARCHAR(6) NOT NULL,
        ownerNameH VARCHAR(100) NOT NULL,
        driverID VARCHAR(10) NOT NULL,
        driverNameH VARCHAR(100) NOT NULL, 
        licenseNumber VARCHAR(11) NOT NULL UNIQUE,
        agencyCode VARCHAR(4) NOT NULL,
        noOfViolations INT NOT NULL,
        recentViolationDate DATE,
        DLCode VARCHAR(5) NOT NULL
    )";

    if ($conn->query($sql_history) === TRUE) {
        echo "OKS history";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_licenseNo = "ALTER TABLE history
    ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";

    if ($conn->query($sql_licenseNo) === TRUE) {
        echo "OKS history 1";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_plateNo = "ALTER TABLE history
    ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";

    if ($conn->query($sql_plateNo) === TRUE) {
        echo "OKS history 2";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_AC = "ALTER TABLE history
    ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

    if ($conn->query($sql_AC) === TRUE) {
        echo "OKS history 3";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_driverID = "ALTER TABLE history
    ADD FOREIGN KEY (driverID) REFERENCES carDriver(driverID);";

    if ($conn->query($sql_driverID) === TRUE) {
        echo "OKS history 4";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $sql_ownerID = "ALTER TABLE history
    ADD FOREIGN KEY (ownerID) REFERENCES carOwner(ownerID);";

    if ($conn->query($sql_ownerID) === TRUE) {
        echo "OKS history 5";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

?>
