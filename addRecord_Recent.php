<?php

include 'DBConnector.php';

if(isset($_POST['SubmitRecord'])) {

   // Insert LTO records into the database
    $insertLTOs = [
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0100', 'LTO REGIONAL OFFICE I (SAN FERNANDO, LA UNION)', 'AGUILA ROAD, CITY OF SAN FERNANDO, LA UNION', 'LTOR1OPERDIV@GMAIL.COM', '072-6070465', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0200', 'LTO REGIONAL OFFICE II (TUGUEGARAO CITY, CAGAYAN)', 'SAN GABRIEL VILLAGE, TUGUEGARAO CITY, CAGAYAN', 'NRUREGION02@GMAIL.COM', '(078) 8449370', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0300', 'LTO REGIONAL OFFICE III (SAN FERNANDO, PAMPANGA)', 'GOVT CENTER, BRGY. MAIMPIS, CITY OF SAN FERNANDO, PAMPANGA', 'LTOREGION3.OPERATIONSDIVISION@GMAIL.COM', '(045) 455-1768', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0401', 'LTO REGIONAL OFFICE IV-A (LIPA CITY, BATANGAS)', 'OLD CITY HALL COMP. INT B. MORADA AVE, LIPA CITY, BATANGAS', '0400OPERATIONS4A@GMAIL.COM', '(043) 756-1438', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0402', 'LTO REGIONAL OFFICE IV-B (CALAPAN CITY, ORIENTAL MINDORO)', 'BRGY. SAN RAFAEL, CALAPAN CITY, ORIENTAL MINDORO', 'LTOMIMAROPAOPERATIONSDIVISION@GMAIL.COM', '09171195006', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0500', 'LTO REGIONAL OFFICE V (LEGAZPI CITY, ALBAY)', 'REGIONAL GOVERNMENT CENTER, RAWIS, LEGAZPI CITY, ALBAY', 'LTOR5OPERATIONS@GMAIL.COM', '09537711766', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0600', 'LTO REGIONAL OFFICE VI (JARO, ILOILO CITY)', 'BRGY. QUINTIN SALAS, JARO, ILOILO CITY', 'AD_SACRAMENTO@YAHOO.COM', '(033) 337 2427', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0700', 'LTO REGIONAL OFFICE VII (NATALIO BACALSO AVENUE, CEBU CITY)', 'NATALIO BACALSO AVENUE, CEBU CITY', 'LTO7OPERATIONSDIV@GMAIL.COM', '(032) 413 5294', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0800', 'LTO REGIONAL OFFICE VIII (PALO, LEYTE)', 'SGOVERNMENT CENTER, CANDAHUG, PALO, LEYTE', 'SLLGERNALE@GMAIL.COM', '(053)888-4951	', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('0900', 'LTO REGIONAL OFFICE IX (BALANGASAN, PAGADIAN CITY)', 'REGIONAL OFFICE-IX, PUROK RIVERSIDE, BALANGASAN, PAGADIAN CITY', 'OKJALALUDDIN@GMAIL.COM', '09165327095	', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1000', 'LTO REGIONAL OFFICE X (BULUA, CAGAYAN DE ORO CITY)', 'MVIS COMPOUND, ZONE 7, BULUA, CAGAYAN DE ORO CITY', 'OPERATIONSDIVISIONR10@GMAIL.COM', '(088) 880 1423', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1100', 'LTO REGIONAL OFFICE XI (TALAMO, DAVAO CITY)', 'LTO REGIONAL OFFICE XI, MVIS COMPOUND, QUIMPO BOULEVARD, TALAMO, DAVAO CITY', 'OPTNSLTOXI@GMAIL.COM', '(082) 296-0985', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1200', 'LTO REGIONAL OFFICE XII (KORONADAL CITY, SOUTH COTABATO)', 'LTO 12 REGIONAL OFFICE YELLOW BELL, BRGY. STA. CRUZ, KORONADAL CITY, SOUTH COTABATO', 'LTOR12OPERATIONSDIVISION@GMAIL.COM', NULL, '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1300', 'LTO REGIONAL OFFICE NCR (ARANETA AVENUE, QUEZON CITY)', 'LTO-NCR BUILDING, 2ND FLOOR 20 G. ARANETA AVE., QUEZON CITY', 'LTONCROPDWEST2019@GMAIL.COM', '09058956522', '8:00 AM', '5:00 PM','0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1400', 'LTO REGIONAL OFFICE CAR (UPPER SESSION ROAD, BAGUIO CITY)', '2ND FLOOR POST OFFICE BUILDING, POST OFFICE LOOP, UPPER SESSION ROAD, BAGUIO CITY', 'DOTRCAROFFICIAL@GMAIL.COM', '074 423 1662', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
        VALUES('1500', 'LTO REGIONAL OFFICE CARAGA (J. ROSALES AVENUE, BUTUAN CITY)', 'J. ROSALES AVENUE, BUTUAN CITY', 'NAA_LAW@YAHOO.COM', '(085) 8171649', '8:00 AM', '5:00 PM', '0')",
    ];

    foreach ($insertLTOs as $insertLTO) {
        if ($conn->query($insertLTO) === TRUE) {
            echo "LTO record added into the database.";
        } else {
            echo "Error inserting LTO record: " . $conn->error;
        }
    }

    // Owner
    $ownerID = floor(rand(100000, 999999));
    $ownerName = $_POST["ownerName"];
    $ownerDateOfBirth = $_POST["ownerDateOfBirth"];
    $ownerSex = $_POST["ownerSex"];
    $ownerBloodType = $_POST["ownerBloodType"];
    $ownerContact = $_POST["ownerContact"];
    $ownerNationality = $_POST["ownerNationality"];
    $ownerHeight = $_POST["ownerHeight"];
    $ownerWeight = $_POST["ownerWeight"];
    $ownerAddress = $_POST["ownerAddress"];
    $no_Of_Vehicles_Owned = $_POST["noOfVehiclesOwned"];

    $insertOwner = "INSERT INTO carowner (ownerID, ownerName, dateOfBirth, sex, bloodType, contactNumber, nationality, heightInCM, weightInKG, ownerAddress, noOfVehiclesOwned) 
    VALUES('$ownerID', '$ownerName', '$ownerDateOfBirth', '$ownerSex', '$ownerBloodType', '$ownerContact', '$ownerNationality', '$ownerHeight', '$ownerWeight', '$ownerAddress','$no_Of_Vehicles_Owned');";

    if ($conn->query($insertOwner) === TRUE) {
        echo "Owner added into the database.";
    } else {
        echo "Error inserting owner: " . $conn->error;
    }

    // Driver
    function generateDriverID($length = 10, $abc = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ") {
        return substr(str_shuffle($abc), 0, $length);
    }

    $driverID = generateDriverID();
    $driverName = $_POST["driverName"];
    $driverDOB = $_POST["driverDateOfBirth"];
    $driverSex = $_POST["driverSex"];
    $driverBloodType = $_POST["driverBloodType"];
    $driverContact = $_POST["driverContact"];
    $driverNationality = $_POST["driverNationality"];
    $driverWeight = $_POST["driverWeight"];
    $driverHeight = $_POST["driverHeight"];
    $driverAddress = $_POST["driverAddress"];

    $insertDriver = "INSERT INTO carDriver (driverID, driverName, dateOfBirth, sex, bloodType, contactNumber, nationality, heightInCM, weightInKG, driverAddress)
    VALUES ('$driverID', '$driverName', '$driverDOB', '$driverSex', '$driverBloodType', '$driverContact', '$driverNationality', '$driverHeight', '$driverWeight', '$driverAddress');";

    if ($conn->query($insertDriver) === TRUE) {
        echo "Driver added into the database.";
    } else {
        echo "Error inserting driver: " . $conn->error;
    }

    // Driver License
    $licenseNumber = $_POST["licenseNumber"];
    $agencyCode = $_POST["agencyCode"];
    $issueDate = $_POST["issueDate"];
    $expirationDate = $_POST["expirationDate"];
    $conditionCode = $_POST["conditionCode"];
    $dlCode = $_POST["dlCode"];

    $insertDriverLicense = "INSERT INTO driverLicense (driverID, driverNameDL, licenseNumber, agencyCode, issueDate, expirationDate, conditionCode, DLCode)
    VALUES ('$driverID', '$driverName', '$licenseNumber', '$agencyCode', '$issueDate', '$expirationDate', '$conditionCode', '$dlCode');";

    if ($conn->query($insertDriverLicense) === TRUE) {
        echo "Driver License added into the database.";
    } else {
        echo "Error inserting driver license: " . $conn->error;
    }

    // Vehicle
    $vehiclePlateNumber = $_POST["vehiclePlateNumber"];
    $registrationDateV = $_POST["registrationDateV"];
    $expirationDateV = $_POST["expirationDateV"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $manufacturer = $_POST["manufacturer"];
    $yearProduced = $_POST["yearProduced"];
    $fuel = $_POST["fuel"];

    $insertVehicle = "INSERT INTO vehicle (plateNumber, ownerNameV, driverNameV, registrationDate, expirationDate, manufacturer, model, color, yearProduced, fuel)
    VALUES ('$vehiclePlateNumber', '$ownerName', '$driverName', '$registrationDateV', '$expirationDateV', '$manufacturer', '$model', '$color', '$yearProduced', '$fuel');";
    
    if ($conn->query($insertVehicle) === TRUE) {
        echo "Vehicle added into the database.";
    } else {
        echo "Error inserting vehicle: " . $conn->error;
    }

    // History
    $no_Of_Violations = $_POST["noOfViolations"];
    $violationDate = $_POST["violationDate"];
    $insertHistory = "INSERT INTO history (plateNumber, ownerNameH, driverNameH, licenseNumber, agencyCode, noOfViolations, recentViolationDate, DLCode) 
    VALUES ('$vehiclePlateNumber', '$ownerName', '$driverName', '$licenseNumber', '$agencyCode', '$no_Of_Violations', '$violationDate', '$dlCode');"; 

    if ($conn->query($insertHistory) === TRUE) {
        echo "History added into the database.";
    } else {
        echo "Error inserting history: " . $conn->error;
    }

}
?>
