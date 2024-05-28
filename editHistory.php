<?php

include 'DBConnector.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data and sanitize it
    $plateNumber = isset($_POST["plateNumber"]) ? trim($_POST["plateNumber"]) : '';
    $ownerNameH = isset($_POST["ownerNameH"]) ? trim($_POST["ownerNameH"]) : '';
    $driverNameH = isset($_POST["driverNameH"]) ? trim($_POST["driverNameH"]) : '';
    $licenseNumber = isset($_POST["licenseNumber"]) ? trim($_POST["licenseNumber"]) : '';
    $agencyCode = isset($_POST["agencyCode"]) ? trim($_POST["agencyCode"]) : '';
    $noOfViolations = isset($_POST["noOfViolations"]) ? trim($_POST["noOfViolations"]) : '';
    $recentViolationDate = isset($_POST["violationDate"]) ? trim($_POST["violationDate"]) : '';
    $DLCode = isset($_POST["DLCode"]) ? trim($_POST["DLCode"]) : '';
    

    // Validate that all required fields are filled out
    if ($plateNumber != "" && $ownerNameH != "" && $driverNameH != "" && $licenseNumber != "" && $agencyCode != "" && $noOfViolations != "" && $recentViolationDate != "" && $DLCode != "") {

        // Start transaction
        $conn->begin_transaction();

        // Update carDriver table
        $updateHistory = "UPDATE history SET 
            plateNumber = '$plateNumber', 
            ownerNameH = '$ownerNameH', 
            driverNameH = '$driverNameH', 
            agencyCode = '$agencyCode', 
            noOfViolations = '$noOfViolations', 
            recentViolationDate = '$recentViolationDate', 
            DLCode = '$DLCode'
            WHERE licenseNumber = '$licenseNumber'";
        
      
        if ($conn->query($updateHistory) === TRUE) {
     

               
            $conn->commit();
            echo "History information updated successfully.";
            header('Location: history.php');
     
        } else {
           
            $conn->rollback();
            echo "Error updating driverLicense information: " . $conn->error;
        }

    } else {
        echo "Error: All fields are required.";
    }

    $conn->close();

} else {
    echo "Error: Invalid request method.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update History Information</title>
</head>
<body>
    <h2>Update History Information</h2>
    <form action="editHistory.php" method="POST">
        <div class="flex-container">
            <div>
                <label for="plateNumber">Plate Number:</label>
                <input type="text" id="plateNumber" name="plateNumber" value="<?php echo htmlspecialchars($plateNumber); ?>" readonly required>
            </div>
            <div>
                <label for="ownerNameH">Owner Name:</label>
                <input type="text" id="ownerNameH" name="ownerNameH" value="<?php echo htmlspecialchars($ownerNameH); ?>" readonly required>
            </div>
            <div>
                <label for="driverNameH">Driver Name:</label>
                <input type="text" id="driverNameH" name="driverNameH" value="<?php echo htmlspecialchars($driverNameH); ?>" readonly required>
            </div>
            <div>
                <label for="licenseNumber">License Number:</label>
                <input type="text" id="licenseNumber" name="licenseNumber" value="<?php echo htmlspecialchars($licenseNumber); ?>" readonly required>
            </div>
            <div>
            <label for="agencyCode">Agency Code:</label>
                <input type="text" id="agencyCode" name="agencyCode" value="<?php echo htmlspecialchars($agencyCode); ?>" readonly required>
            </div>
            <div>
                <label for="noOfViolations">No. of Violation/s:</label>
                <input type="number" id="noOfViolations" name="noOfViolations" required>
            </div>
            <div>
                <label for="violationDate">Recent Date of Violation/s:</label>
                <input type="date" id="violationDate" name="violationDate" required>
            </div>
            <div>
            <label for="DLCode">DL Code:</label>
                <input type="text" id="DLCode" name="DLCode" value="<?php echo htmlspecialchars($DLCode); ?>" readonly required>
            </div>
        </div>
        <button name ="submit" type="submit">Update History</button>
    </form>
</body>
</html>
