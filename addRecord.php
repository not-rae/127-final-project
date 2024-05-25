<?php

include 'DBConnector.php';


//Car Owner



if(isset($_POST['SubmitOwner'])) {
    $ownerName = $_POST["ownerName"];
    $ownerDateOfBirth= $_POST["ownerDateOfBirth"];
    $ownerSex = $_POST["ownerSex"];
    $ownerBloodType = $_POST["ownerBloodType"];
    $ownerContactNumber = $_POST["ownerContact"];
    $ownerNationality = $_POST["ownerNationality"];
    $ownerHeight = $_POST["ownerHeight"];
    $ownerWeight = $_POST["ownerWeight"];
    $ownerAddress = $_POST["ownerAddress"];
    $ownerVehicles = $_POST["noOfVehiclesOwned"];

$ownerID = floor(rand(100000, 999999));

    $insertOwner = "INSERT INTO carowner (ownerID, ownerName, dateOfBirth, sex, bloodType, contactNumber,
    nationality, heightInCM, weightInKG, ownerAddress, noOfVehiclesOwned) 
    VALUES('$ownerID', '$ownerName', '$ownerDateOfBirth', '$ownerSex', '$ownerBloodType',
            '$ownerContactNumber', '$ownerNationality', '$ownerHeight', '$ownerWeight',
            '$ownerAddress','$ownerVehicles');";

    if($conn->query($insertOwner) === TRUE){
        echo "Owner added into the database.";
        header("Location: owner.php");

    }
    else{
        echo "Error inserting values";
    }
    

}


// //Car Driver:
function generateDriverID($length = 10, $abc = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ")
{
    return substr(str_shuffle($abc), 0, $length);
}



if(isset($_POST['SubmitDriver'])) {
    $driverName = $_POST["driverName"];
    $driverDateOfBirth= $_POST["driverDateOfBirth"];
    $driverSex = $_POST["driverSex"];
    $driverBloodType = $_POST["driverBloodType"];
    $driverContactNumber = $_POST["driverContact"];
    $driverNationality = $_POST["driverNationality"];
    $driverHeight = $_POST["driverHeight"];
    $driverWeight = $_POST["driverWeight"];
    $driverAddress = $_POST["driverAddress"];
    $driverID = generateDriverID();

    $insertDriver = "INSERT INTO cardriver (driverID, driverName, dateOfBirth, sex, bloodType, contactNumber,
    nationality, heightInCM, weightInKG, driverAddress) 
    VALUES('$driverID', '$driverName', '$driverDateOfBirth', '$driverSex', '$driverBloodType',
            '$driverContactNumber', '$driverNationality', '$driverHeight', '$driverWeight',
            '$driverAddress');";

    if($conn->query($insertDriver) === TRUE){
        echo "Driver added into the database.";
        header("Location: driver.php");

    }
    else{
        echo "Error inserting values";
    }
    

}

// // VEHICLE:


if(isset($_POST['SubmitVehicle'])) {
    $plateNumber = $_POST["plateNumber"];
    $ownerV = $_POST["ownerNameV"];
    $driverV = $_POST["driverNameV"];
    $registrationDateV = $_POST["registrationDateV"];
    $expirationDateV = $_POST["expirationDateV"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $manufacturer = $_POST["manufacturer"];
    $yearProduced = $_POST["yearProduced"];
    $fuel = $_POST["fuel"];
    $insertVehicle = "INSERT INTO vehicle (plateNumber, ownerNameV, driverNameV, registrationDate, expirationDate, manufacturer,
    model, color, yearProduced, fuel) 
    VALUES('$plateNumber', '$ownerV', '$driverV', '$registrationDateV', '$expirationDateV',
    '$manufacturer','$model', '$color', '$yearProduced',
            '$fuel');";

    if($conn->query($insertVehicle) === TRUE){
        echo "Vehicle added into the database.";
        header("Location: vehicle.php");

    }
    else{
        echo "Error inserting values";
    }
    

}


// HISTORY:






// DRIVERS LICENSE:






//LTO:

// $insertLTO = "INSERT INTO LTO (agencyCode, agencyName, LTOAddress, emailAddress, contactNumber, startingHour, endingHour, noOfCarsRegistered)
// -- VALUES('0100', 'LTO REGIONAL OFFICE I (SAN FERNANDO, LA UNION)', 'AGUILA ROAD, CITY OF SAN FERNANDO, LA UNION', 'LTOR1OPERDIV@GMAIL.COM', '072-6070465', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0200', 'LTO REGIONAL OFFICE II (TUGUEGARAO CITY, CAGAYAN)', 'SAN GABRIEL VILLAGE, TUGUEGARAO CITY, CAGAYAN', 'NRUREGION02@GMAIL.COM', '(078) 8449370', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0300', 'LTO REGIONAL OFFICE III (SAN FERNANDO, PAMPANGA)', 'GOVT CENTER, BRGY. MAIMPIS, CITY OF SAN FERNANDO, PAMPANGA', 'LTOREGION3.OPERATIONSDIVISION@GMAIL.COM', '(045) 455-1768', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0401', 'LTO REGIONAL OFFICE IV-A (LIPA CITY, BATANGAS)', 'OLD CITY HALL COMP. INT B. MORADA AVE, LIPA CITY, BATANGAS', '0400OPERATIONS4A@GMAIL.COM', '(043) 756-1438', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0402', 'LTO REGIONAL OFFICE IV-B (CALAPAN CITY, ORIENTAL MINDORO)', 'BRGY. SAN RAFAEL, CALAPAN CITY, ORIENTAL MINDORO', 'LTOMIMAROPAOPERATIONSDIVISION@GMAIL.COM', '09171195006', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0500', 'LTO REGIONAL OFFICE V (LEGAZPI CITY, ALBAY)', 'REGIONAL GOVERNMENT CENTER, RAWIS, LEGAZPI CITY, ALBAY', 'LTOR5OPERATIONS@GMAIL.COM', '09537711766', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0600', 'LTO REGIONAL OFFICE VI (JARO, ILOILO CITY)', 'BRGY. QUINTIN SALAS, JARO, ILOILO CITY', 'AD_SACRAMENTO@YAHOO.COM', '(033) 337 2427', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0700', 'LTO REGIONAL OFFICE VII (NATALIO BACALSO AVENUE, CEBU CITY)', 'NATALIO BACALSO AVENUE, CEBU CITY', 'LTO7OPERATIONSDIV@GMAIL.COM', '(032) 413 5294', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0800', 'LTO REGIONAL OFFICE VIII (PALO, LEYTE)', 'SGOVERNMENT CENTER, CANDAHUG, PALO, LEYTE', 'SLLGERNALE@GMAIL.COM', '(053)888-4951	', '8:00 AM', '5:00 PM', '0');
// -- VALUES('0900', 'LTO REGIONAL OFFICE IX (BALANGASAN, PAGADIAN CITY)', 'REGIONAL OFFICE-IX, PUROK RIVERSIDE, BALANGASAN, PAGADIAN CITY', 'OKJALALUDDIN@GMAIL.COM', '09165327095	', '8:00 AM', '5:00 PM', '0');
// -- VALUES('1000', 'LTO REGIONAL OFFICE X (BULUA, CAGAYAN DE ORO CITY)', 'MVIS COMPOUND, ZONE 7, BULUA, CAGAYAN DE ORO CITY', 'OPERATIONSDIVISIONR10@GMAIL.COM', '(088) 880 1423', '8:00 AM', '5:00 PM', '0');
// -- VALUES('1100', 'LTO REGIONAL OFFICE XI (TALAMO, DAVAO CITY)', 'LTO REGIONAL OFFICE XI, MVIS COMPOUND, QUIMPO BOULEVARD, TALAMO, DAVAO CITY', 'OPTNSLTOXI@GMAIL.COM', '(082) 296-0985', '8:00 AM', '5:00 PM', '0');
// -- VALUES('1200', 'LTO REGIONAL OFFICE XII (KORONADAL CITY, SOUTH COTABATO)', 'LTO 12 REGIONAL OFFICE YELLOW BELL, BRGY. STA. CRUZ, KORONADAL CITY, SOUTH COTABATO', 'LTOR12OPERATIONSDIVISION@GMAIL.COM', NULL, '8:00 AM', '5:00 PM', '0');
// -- VALUES('1300', 'LTO REGIONAL OFFICE NCR (ARANETA AVENUE, QUEZON CITY)', 'LTO-NCR BUILDING, 2ND FLOOR 20 G. ARANETA AVE., QUEZON CITY', 'LTONCROPDWEST2019@GMAIL.COM', '09058956522', '8:00 AM', '5:00 PM','0');
// -- VALUES('1400', 'LTO REGIONAL OFFICE CAR (UPPER SESSION ROAD, BAGUIO CITY)', '2ND FLOOR POST OFFICE BUILDING, POST OFFICE LOOP, UPPER SESSION ROAD, BAGUIO CITY', 'DOTRCAROFFICIAL@GMAIL.COM', '074 423 1662', '8:00 AM', '5:00 PM', '0');
// -- VALUES('1500', 'LTO REGIONAL OFFICE CARAGA (J. ROSALES AVENUE, BUTUAN CITY)', 'J. ROSALES AVENUE, BUTUAN CITY', 'NAA_LAW@YAHOO.COM', '(085) 8171649', '8:00 AM', '5:00 PM', '0');";


if(isset($_POST['submitDL'])) {

 $sqlNoCarsReg = 
 "
    CREATE TRIGGER increment_cars_registered_trigger AFTER INSERT ON driverLicense
    FOR EACH ROW
    BEGIN
        UPDATE LTO
        SET noOfCarsRegistered = noOfCarsRegistered + 1
        WHERE agencyCode = '$agencyCode';
    END;
";


if ($conn->query($sqlNoCarsReg) === TRUE) {
    echo "Trigger created successfully";
} else {
    echo "Error creating trigger: " . $conn->error;
}

}

$conn->close();



















































?>