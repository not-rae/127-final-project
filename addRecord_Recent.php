<?php

include 'DBConnector.php';

if(isset($_POST['SubmitRecord'])) {

    // Insert LTO records into the database
    $insertLTOs = [
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0100', 'LTO REGIONAL OFFICE I (SAN FERNANDO, LA UNION)', 'AGUILA ROAD, CITY OF SAN FERNANDO, LA UNION', 'LTOR1OPERDIV@GMAIL.COM', '072-6070465', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0200', 'LTO REGIONAL OFFICE II (TUGUEGARAO CITY, CAGAYAN)', 'SAN GABRIEL VILLAGE, TUGUEGARAO CITY, CAGAYAN', 'NRUREGION02@GMAIL.COM', '(078) 8449370', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0300', 'LTO REGIONAL OFFICE III (SAN FERNANDO, PAMPANGA)', 'GOVT CENTER, BRGY. MAIMPIS, CITY OF SAN FERNANDO, PAMPANGA', 'LTOREGION3.OPERATIONSDIVISION@GMAIL.COM', '(045) 455-1768', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0401', 'LTO REGIONAL OFFICE IV-A (LIPA CITY, BATANGAS)', 'OLD CITY HALL COMP. INT B. MORADA AVE, LIPA CITY, BATANGAS', '0400OPERATIONS4A@GMAIL.COM', '(043) 756-1438', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0402', 'LTO REGIONAL OFFICE IV-B (CALAPAN CITY, ORIENTAL MINDORO)', 'BRGY. SAN RAFAEL, CALAPAN CITY, ORIENTAL MINDORO', 'LTOMIMAROPAOPERATIONSDIVISION@GMAIL.COM', '09171195006', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0500', 'LTO REGIONAL OFFICE V (LEGAZPI CITY, ALBAY)', 'REGIONAL GOVERNMENT CENTER, RAWIS, LEGAZPI CITY, ALBAY', 'LTOR5OPERATIONS@GMAIL.COM', '09537711766', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0600', 'LTO REGIONAL OFFICE VI (JARO, ILOILO CITY)', 'BRGY. QUINTIN SALAS, JARO, ILOILO CITY', 'AD_SACRAMENTO@YAHOO.COM', '(033) 337 2427', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0700', 'LTO REGIONAL OFFICE VII (NATALIO BACALSO AVENUE, CEBU CITY)', 'NATALIO BACALSO AVENUE, CEBU CITY', 'LTO7OPERATIONSDIV@GMAIL.COM', '(032) 413 5294', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0800', 'LTO REGIONAL OFFICE VIII (PALO, LEYTE)', 'SGOVERNMENT CENTER, CANDAHUG, PALO, LEYTE', 'SLLGERNALE@GMAIL.COM', '(053)888-4951	', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('0900', 'LTO REGIONAL OFFICE IX (BALANGASAN, PAGADIAN CITY)', 'REGIONAL OFFICE-IX, PUROK RIVERSIDE, BALANGASAN, PAGADIAN CITY', 'OKJALALUDDIN@GMAIL.COM', '09165327095	', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1000', 'LTO REGIONAL OFFICE X (BULUA, CAGAYAN DE ORO CITY)', 'MVIS COMPOUND, ZONE 7, BULUA, CAGAYAN DE ORO CITY', 'OPERATIONSDIVISIONR10@GMAIL.COM', '(088) 880 1423', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1100', 'LTO REGIONAL OFFICE XI (TALAMO, DAVAO CITY)', 'LTO REGIONAL OFFICE XI, MVIS COMPOUND, QUIMPO BOULEVARD, TALAMO, DAVAO CITY', 'OPTNSLTOXI@GMAIL.COM', '(082) 296-0985', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1200', 'LTO REGIONAL OFFICE XII (KORONADAL CITY, SOUTH COTABATO)', 'LTO 12 REGIONAL OFFICE YELLOW BELL, BRGY. STA. CRUZ, KORONADAL CITY, SOUTH COTABATO', 'LTOR12OPERATIONSDIVISION@GMAIL.COM', NULL, '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1300', 'LTO REGIONAL OFFICE NCR (ARANETA AVENUE, QUEZON CITY)', 'LTO-NCR BUILDING, 2ND FLOOR 20 G. ARANETA AVE., QUEZON CITY', 'LTONCROPDWEST2019@GMAIL.COM', '09058956522', '8:00 AM', '5:00 PM','0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1400', 'LTO REGIONAL OFFICE CAR (UPPER SESSION ROAD, BAGUIO CITY)', '2ND FLOOR POST OFFICE BUILDING, POST OFFICE LOOP, UPPER SESSION ROAD, BAGUIO CITY', 'DOTRCAROFFICIAL@GMAIL.COM', '074 423 1662', '8:00 AM', '5:00 PM', '0')",
        "INSERT IGNORE INTO lto (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfDriversRegistered)
        VALUES('1500', 'LTO REGIONAL OFFICE CARAGA (J. ROSALES AVENUE, BUTUAN CITY)', 'J. ROSALES AVENUE, BUTUAN CITY', 'NAA_LAW@YAHOO.COM', '(085) 8171649', '8:00 AM', '5:00 PM', '0')",
    ];

    foreach ($insertLTOs as $insertLTO) {
        if ($conn->query($insertLTO) !== TRUE) {
            echo "Error inserting LTO record: " . $conn->error;
        }
    }

    // User
    $userID = floor(rand(100000, 999999));
    $userName = $_POST["userName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $sex = $_POST["sex"];
    $bloodType = $_POST["bloodType"];
    $contact = $_POST["contact"];
    $nationality = $_POST["nationality"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $address = $_POST["userAddress"];
    $role = $_POST["userRole"];

    $insertUser = "INSERT INTO user (userID, userName, dateOfBirth, sex, bloodType, contactNumber, nationality, heightInCM, weightInKG, userAddress, userRole) 
                   VALUES('$userID', '$userName', '$dateOfBirth', '$sex', '$bloodType', '$contact', '$nationality', '$height', '$weight', '$address', '$role')";

    if ($conn->query($insertUser) !== TRUE) {
        echo "Error inserting user: " . $conn->error . "<br>";
    }

    // Driver License

    if($role === "Driver" || $role === "Both"){
        $licenseNumber = $_POST["licenseNumber"];
        $agencyCode = $_POST["agencyCode"];
        $issueDate = $_POST["issueDate"];
        $expirationDate = $_POST["expirationDate"];
        $conditionCode = $_POST["conditionCode"];
        $dlCode = $_POST["dlCode"];
        $insertDriverLicense = "INSERT INTO driverLicense (userID, driverName, licenseNumber, agencyCode, issueDate, expirationDate, conditionCode, DLCode)
                                VALUES ('$userID', '$userName', '$licenseNumber', '$agencyCode', '$issueDate', '$expirationDate', '$conditionCode', '$dlCode')";

        if ($conn->query($insertDriverLicense) !== TRUE) {
            echo "Error inserting driver license: " . $conn->error . "<br>";
        }
    }

    // Vehicle

    if($role === "Owner" || $role === "Both"){
        $vehiclePlateNumber = $_POST["vehiclePlateNumber"];
        $registrationDateV = $_POST["registrationDateV"];
        $expirationDateV = $_POST["expirationDateV"];
        $model = $_POST["model"];
        $color = $_POST["color"];
        $manufacturer = $_POST["manufacturer"];
        $yearProduced = $_POST["yearProduced"];
        $fuel = $_POST["fuel"];
        $insertVehicle = "INSERT INTO vehicle (plateNumber, userID, ownerName, registrationDate, expirationDate, manufacturer, model, color, yearProduced, fuel)
                          VALUES ('$vehiclePlateNumber', '$userID', '$userName', '$registrationDateV', '$expirationDateV', '$manufacturer', '$model', '$color', '$yearProduced', '$fuel')";
        
        if ($conn->query($insertVehicle) !== TRUE) {
            echo "Error inserting vehicle: " . $conn->error . "<br>";
        }
    }

  
}

?>