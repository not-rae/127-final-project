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
        if ($conn->query($insertLTO) === TRUE) {
            echo "LTO record added into the database.";
            header('Location: index.php');
        } else {
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
  

    $insertUser = "INSERT INTO user (userID, userName, dateOfBirth, sex, bloodType, contactNumber, nationality, heightInCM, weightInKG, usnerAddress, userRole) 
    VALUES('$userID', '$userName', '$dateOfBirth', '$sex', '$bloodType', '$contact', '$nationality', '$height', '$weight', '$address', '$role');";

    if ($conn->query($insertOwner) === TRUE) {
        echo "Owner added into the database.";
    } else {
        echo "Error inserting owner: " . $conn->error;
    }


    // Driver License
    $licenseNumber = $_POST["licenseNumber"];
    $agencyCode = $_POST["agencyCode"];
    $issueDate = $_POST["issueDate"];
    $expirationDate = $_POST["expirationDate"];
    $conditionCode = $_POST["conditionCode"];
    $dlCode = $_POST["dlCode"];

    if($role === "driver" OR $role === "both"){
        $insertDriverLicense = "INSERT INTO driverLicense (userID, driverName, licenseNumber, agencyCode, issueDate, expirationDate, conditionCode, DLCode)
        VALUES ('$userID', '$userName', '$licenseNumber', '$agencyCode', '$issueDate', '$expirationDate', '$conditionCode', '$dlCode');";

        if ($conn->query($insertDriverLicense) === TRUE) {
            echo "Driver License added into the database.";

        } else {
            echo "Error inserting driver license: " . $conn->error;
        }
    }
    else{
        echo "Error is not driver: " . $conn->error;
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


    if($role === "owner" OR $role === "both"){
        $insertVehicle = "INSERT INTO vehicle (plateNumber, userID, ownerName, registrationDate, expirationDate, manufacturer, model, color, yearProduced, fuel)
        VALUES ('$vehiclePlateNumber', '$userID', '$userName', '$registrationDateV', '$expirationDateV', '$manufacturer', '$model', '$color', '$yearProduced', '$fuel');";
        
        if ($conn->query($insertVehicle) === TRUE) {
            echo "Vehicle added into the database.";
        } else {
            echo "Error inserting vehicle: " . $conn->error;
        }
    }
    else{
        echo "Error: is not owner";
    }

    // Different Form:

    // violations

    $insertViolations = [
        "INSERT IGNORE INTO violations (violationID, violationName)
        VALUES('V001', 'Smoke Belching')",
        "INSERT IGNORE INTO violations (violationID, violationName)
        VALUES('V002', 'Driving While Intoxicated/Drugged')",
        "INSERT IGNORE INTO violations (violationID, violationName)
        VALUES('V003', 'Disregarding Traffic Signs')",
        "INSERT IGNORE INTO violations (violationID, violationName)
        VALUES('V004', 'Jallosies')",
        "INSERT IGNORE INTO violations (violationID, violationName)
        VALUES('V005', 'Reckless Driving')",
    ];

    foreach ($insertViolationS as $insertViolations) {
        if ($conn->query($insertViolations) === TRUE) {
            echo "Violation record added into the database.";
            header('Location: index.php');
        } else {
            echo "Error inserting Violation record: " . $conn->error;
        }
    }


    // report
    function generatereportID($length = 10, $abc = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"){
    return substr(str_shuffle($abc), 0, $length);
    }

    $reportID = generatereportID();
    $violationDate = $_POST["violationDate"];
    $violationID = $_POST["violationID"];
    $ownerIDR = "SELECT userID FROM Vehicle WHERE vehicle.userID = $userID";
    $licenseNumberR = "SELECT licenseNumber FROM driverLicense WHERE driverLicense.userID = $userID";
    $plateNumberR = "SELECT plateNumber FROM vehicle WHERE vehicle.userID = $userID";
    $insertReport = "INSERT INTO report (reportID, userID, plateNumber, licenseNumber, violationID, violationDate) 
    VALUES ('$vehiclePlateNumber', '$reportID', '$ownerIDR', '$licenseNumberR', '$plateNumberR', '$licenseNumberR', '$violationID', '$violationDate');"; 

    if ($conn->query($insertReport) === TRUE) {
        echo "Report added into the database.";
    } else {
        echo "Error inserting history: " . $conn->error;
    }

    // rep_vio
    $insertReport = "INSERT INTO rep_vio (reportID, violationID)
    VALUES('$reportID', '$violationID);"; 

    // History
    $no_Of_Violations = $_POST["noOfViolations"];
    $violationDate = $_POST["violationDate"];
    $ownerNameH = "SELECT ownerName FROM vehicle WHERE vehicle.userID = user.userID ";
    $driverNameH = "SELECT driverName FROM driverLicense WHERE driverLicense.userID = $userID";
    $violationIDRV = "SELECT violationID FROM rep_vio WHERE rep_vio.violationID = $violationID";
    $violatonDateR = "SELECT violationDate FROM report WHERE report.reportID = rep_vio.reportID";
    $insertHistory = "INSERT INTO history (plateNumber, userID, ownerNameH, licenseNumber, driverNameH,  agencyCode, reportID, violationID, violationDate, DLCode) 
    VALUES ('$vehiclePlateNumber', '$userID', '$ownerNameH', '$licenseNumber', '$userName', '$licenseNumber', '$agencyCode', '$violationIDRV', '$violationDateR', '$dlCode');"; 

    if ($conn->query($insertHistory) === TRUE) {
        echo "History added into the database.";
    } else {
        echo "Error inserting history: " . $conn->error;
    }
    }
?>
