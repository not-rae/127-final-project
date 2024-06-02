<?php
include 'DBConnector.php';

if(isset($_POST['SubmitReport'])) {
    $userID = $_POST["userID"];
    $licenseNumber = $_POST["licenseNumber"];

    // Violations
    $insertViolations = [
        "INSERT IGNORE INTO violation (violationID, violationName) VALUES('V001', 'Smoke Belching')",
        "INSERT IGNORE INTO violation (violationID, violationName) VALUES('V002', 'Driving While Intoxicated/Drugged')",
        "INSERT IGNORE INTO violation (violationID, violationName) VALUES('V003', 'Disregarding Traffic Signs')",
        "INSERT IGNORE INTO violation (violationID, violationName) VALUES('V004', 'Jallosies')",
        "INSERT IGNORE INTO violation (violationID, violationName) VALUES('V005', 'Reckless Driving')",
    ];

    foreach ($insertViolations as $insertViolation) {
        if ($conn->query($insertViolation) !== TRUE) {
            echo "Error inserting violation record: " . $conn->error . "<br>";
        }
    }

    // Report
    function generatereportID($length = 10, $abc = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"){
        return substr(str_shuffle($abc), 0, $length);
    }

    $reportID = generatereportID();
    $violationDate = $_POST["violationDate"];
    $violationID = $_POST["violation"];
    $ownerIDR = $conn->query("SELECT userID FROM vehicle WHERE vehicle.userID = '$userID'")->fetch_assoc()['userID'];
    $licenseNumberR = $conn->query("SELECT licenseNumber FROM driverLicense WHERE driverLicense.licenseNumber = '$licenseNumber'")->fetch_assoc()['licenseNumber'];
    $plateNumberR = $conn->query("SELECT plateNumber FROM vehicle WHERE vehicle.userID = '$userID'")->fetch_assoc()['plateNumber'];

    $insertReport = "INSERT INTO report (reportID, userID, plateNumber, licenseNumber, violationID, violationDate) 
                     VALUES ('$reportID', '$userID', '$plateNumberR', '$licenseNumberR', '$violationID', '$violationDate')";

    if ($conn->query($insertReport) !== TRUE) {
        echo "Error inserting report: " . $conn->error . "<br>";
    }

    // rep_vio
    $insertRepVio = "INSERT INTO rep_vio (reportID, violationID) VALUES('$reportID', '$violationID')"; 

    if ($conn->query($insertRepVio) !== TRUE) {
        echo "Error inserting rep_vio: " . $conn->error . "<br>";
    }

    // History
    $ownerNameH = $conn->query("SELECT ownerName FROM vehicle WHERE vehicle.userID = '$userID'")->fetch_assoc()['ownerName'];
    $driverNameH = $conn->query("SELECT driverName FROM driverLicense WHERE driverLicense.licenseNumber = '$licenseNumber'")->fetch_assoc()['driverName'];
    $violationIDRV = $conn->query("SELECT violationID FROM rep_vio WHERE rep_vio.reportID = '$reportID'")->fetch_assoc()['violationID'];
    $violationDateR = $conn->query("SELECT violationDate FROM report WHERE report.reportID = '$reportID'")->fetch_assoc()['violationDate'];
    $agencyCode = $conn->query("SELECT agencyCode FROM driverLicense WHERE driverLicense.licenseNumber = '$licenseNumber'")->fetch_assoc()['agencyCode'];
    $dlCode = $conn->query("SELECT DLCode FROM driverLicense WHERE driverLicense.licenseNumber = '$licenseNumber'")->fetch_assoc()['DLCode'];
    $insertHistory = "INSERT INTO history (plateNumber, userID, ownerNameH, licenseNumber, driverNameH, agencyCode, reportID, violationID, violationDate, DLCode) 
                      VALUES ('$plateNumberR', '$userID', '$ownerNameH', '$licenseNumberR', '$driverNameH', '$agencyCode', '$reportID', '$violationIDRV', '$violationDateR', '$dlCode')"; 

    if ($conn->query($insertHistory) !== TRUE) {
        echo "Error inserting history: " . $conn->error . "<br>";
    }
}
    header("Location: index.php");
    exit;
?>