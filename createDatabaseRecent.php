<?php
    
    include 'DBConnector.php';
    
    // $sql = "CREATE DATABASE driverify";
    // if ($conn->query($sql) === TRUE) {
    //     echo "Database created successfully";
    
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // create LTO table
    // $sql_LTO = "CREATE TABLE LTO(
    //     agencyCode VARCHAR(4) NOT NULL UNIQUE PRIMARY KEY,
    //     agencyName VARCHAR(100) NOT NULL,
    //     LTOaddress VARCHAR(1000) NOT NULL,
    //     emailAddress VARCHAR(60),
    //     contactNumber VARCHAR(20) UNIQUE, 
    //     startingHour VARCHAR(20) NOT NULL,
    //     endingHour VARCHAR(20) NOT NULL,
    //     noOfDriversRegistered BIGINT UNSIGNED
    // )";

    // if ($conn->query($sql_LTO) === TRUE) {
    //     echo "OKS LTO";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

        
    // create user table
    // $sql_user = "CREATE TABLE User(
    //     userID VARCHAR(8) NOT NULL PRIMARY KEY,
    //     userName VARCHAR(100) NOT NULL,
    //     dateOfBirth DATE NOT NULL,
    //     sex CHAR(5) NOT NULL,
    //     bloodType CHAR(5) NOT NULL,
    //     contactNumber VARCHAR(11) NOT NULL UNIQUE,
    //     nationality CHAR(20) NOT NULL,
    //     heightInCM INT(5) UNSIGNED,
    //     weightInKG INT(3) UNSIGNED,  
    //     userAddress VARCHAR(100) NOT NULL,
    //     userRole CHAR(6) NOT NULL
    // )";

    // if ($conn->query($sql_user) === TRUE) {
    //     echo "OKS User";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }


    // // create vehicle table
    // $sql_vehicle = "CREATE TABLE Vehicle(
    //     plateNumber VARCHAR(6) NOT NULL PRIMARY KEY,
    //     userID VARCHAR(8) NOT NULL,
    //     ownerName VARCHAR(100) NOT NULL,
    //     registrationDate DATE NOT NULL,
    //     expirationDate DATE NOT NULL,
    //     manufacturer CHAR(20) NOT NULL,
    //     model VARCHAR(20) NOT NULL,
    //     color CHAR(10) NOT NULL,
    //     yearProduced SMALLINT(4) UNSIGNED NOT NULL
    //     CHECK (yearProduced >= 1000 and yearProduced <= 9999),
    //     fuel CHAR(10) NOT NULL
    // )";

    // if ($conn->query($sql_vehicle) === TRUE) {
    //     echo "OKS vehicle";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // $sql_driverIDV = "ALTER TABLE vehicle
    // ADD FOREIGN KEY (userID) REFERENCES User(userID);";

    // if ($conn->query($sql_driverIDV) === TRUE) {
    //     echo "OKS vehicle fk";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }


    // // create driverLicense table
    // $sql_driverLicense = "CREATE TABLE driverLicense(
    //     userID VARCHAR(8) NOT NULL,
    //     driverName VARCHAR(100) NOT NULL,
    //     licenseNumber VARCHAR(11) NOT NULL PRIMARY KEY,
    //     agencyCode VARCHAR(4) NOT NULL,
    //     issueDate DATE NOT NULL,
    //     expirationDate DATE NOT NULL,
    //     conditionCode VARCHAR(10) NOT NULL,
    //     DLCode VARCHAR(5) NOT NULL
    // )";

    // if ($conn->query($sql_driverLicense) === TRUE) {
    //     echo "OKS driverLicense";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // $sql_driverIDDL = "ALTER TABLE driverLicense
    // ADD FOREIGN KEY (userID) REFERENCES User(userID);";

    // if ($conn->query($sql_driverIDDL) === TRUE) {
    //     echo "OKS driverLicense fk";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    // $sql_AC = "ALTER TABLE driverLicense
    // ADD FOREIGN KEY (agencyCode) REFERENCES LTO(agencyCode);";

    // if ($conn->query($sql_AC) === TRUE) {
    //     echo "OKS driverLicense 2";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

    //create violation table
    // $sql_violations = "CREATE TABLE violation(
    //     violationID VARCHAR(6) NOT NULL PRIMARY KEY,
    //     violationName VARCHAR(80) NOT NULL)";
    // if ($conn->query($sql_violations) === TRUE) {
    //         echo "OKS violations";
            
    // } else {
    //         echo "Error creating database: " . $conn->error;
    // }
    // //create report table

    // $sql_report = "CREATE TABLE report(
    //     reportID VARCHAR(10) NOT NULL PRIMARY KEY,
    //     userID VARCHAR(8) NOT NULL, 
    //     plateNumber VARCHAR(6) NOT NULL,
    //     licenseNumber VARCHAR(11) NOT NULL,
    //     violationID VARCHAR(200) NOT NULL,
    //     violationDate DATE NOT NULL
    //     )";
    //      if ($conn->query($sql_report) === TRUE) {
    //         echo "OKS accident";
            
    //     } else {
    //         echo "Error creating database: " . $conn->error;
    //     }

    
    //     $sql_licenseNo = "ALTER TABLE report
    //     ADD FOREIGN KEY (licenseNumber) REFERENCES driverLicense(licenseNumber);";
    
    //     if ($conn->query($sql_licenseNo) === TRUE) {
    //         echo "OKS report 1";
            
    //     } else {
    //         echo "Error creating database: " . $conn->error;
    //     }
    
    //     $sql_plateNo = "ALTER TABLE report
    //     ADD FOREIGN KEY (plateNumber) REFERENCES Vehicle(plateNumber);";
    
    //     if ($conn->query($sql_plateNo) === TRUE) {
    //         echo "OKS report 2";
            
    //     } else {
    //         echo "Error creating database: " . $conn->error;
    //     }
    
    //     $sql_userID = "ALTER TABLE report
    //     ADD FOREIGN KEY (userID) REFERENCES User(userID);";
    
    //     if ($conn->query($sql_ID) === TRUE) {
    //         echo "OKS report 3";
            
    //     } else {
    //         echo "Error creating database: " . $conn->error;
    //     }




     //create report and violation relationship
    // $sql_rep_vio = "CREATE TABLE rep_vio(
    //     violationID VARCHAR(6) NOT NULL,
    //     reportID VARCHAR(10) NOT NULL)";
    // if ($conn->query($sql_rep_vio) === TRUE) {
    //         echo "OKS rep_vio";
            
    // } else {
    //         echo "Error creating database: " . $conn->error;
    // }


     $sql_violationID = "ALTER TABLE rep_vio
     ADD FOREIGN KEY (violationID) REFERENCES violation(violationID);";
 
    if ($conn->query($sql_violationID) === TRUE) {
         echo "OKS acc_vio 1";
         
    } else {
         echo "Error creating database: " . $conn->error;
    }

     $sql_reportID = "ALTER TABLE rep_vio
     ADD FOREIGN KEY (reportID) REFERENCES report(reportID);";
 
     if ($conn->query($sql_reportID) === TRUE) {
         echo "OKS acc_vio 2";
         
     } else {
         echo "Error creating database: " . $conn->error;
     }
 
    // create history table
    // $sql_history = "CREATE TABLE history(
    //     plateNumber VARCHAR(6) NOT NULL,
    //     userID VARCHAR(8) NOT NULL,
    //     ownerNameH VARCHAR(100) NOT NULL,
    //     licenseNumber VARCHAR(11) NOT NULL,
    //     driverNameH VARCHAR(100) NOT NULL, 
    //     agencyCode VARCHAR(4) NOT NULL,
    //     reportID VARCHAR(10) NOT NULL,
    //     violationID VARCHAR(5) NOT NULL,
    //     violationDate DATE,
    //     DLCode VARCHAR(5) NOT NULL
    // )";

    // if ($conn->query($sql_history) === TRUE) {
    //     echo "OKS history";
        
    // } else {
    //     echo "Error creating database: " . $conn->error;
    // }

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

    $sql_userID = "ALTER TABLE history
    ADD FOREIGN KEY (userID) REFERENCES User(userID);";

    if ($conn->query($sql_userID) === TRUE) {
        echo "OKS history 4";
        
    } else {
        echo "Error creating database: " . $conn->error;
    }

?>
