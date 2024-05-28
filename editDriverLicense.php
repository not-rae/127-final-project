<?php

include 'DBConnector.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $driverID = isset($_POST["driverID"]) ? trim($_POST["driverID"]) : '';
    $driverName = isset($_POST["driverName"]) ? trim($_POST["driverName"]) : '';
    $licenseNumber = isset($_POST["licenseNumber"]) ? trim($_POST["licenseNumber"]) : '';
    $agencyCode = isset($_POST["agencyCode"]) ? trim($_POST["agencyCode"]) : '';
    $issueDate = isset($_POST["issueDate"]) ? trim($_POST["issueDate"]) : '';
    $expirationDate = isset($_POST["expirationDate"]) ? trim($_POST["expirationDate"]) : '';
    $conditionCode = isset($_POST["conditionCode"]) ? trim($_POST["conditionCode"]) : '';
    $dlCode = isset($_POST["dlCode"]) ? trim($_POST["dlCode"]) : '';


    if ($driverID != "" && $driverName != "" && $licenseNumber != "" && $agencyCode != "" && $issueDate != "" && $expirationDate != "" && $conditionCode != "" && $dlCode != "" ) {


        $conn->begin_transaction();

        // Update carDriver table
        $updateDL = "UPDATE driverLicense SET 
            driverID = '$driverID', 
            driverNameDL = '$driverName', 
            agencyCode = '$agencyCode', 
            issueDate = '$issueDate', 
            expirationDate = '$expirationDate', 
            conditionCode = '$conditionCode', 
            DLCode = '$dlCode'
            WHERE licenseNumber = '$licenseNumber'";

        // Execute the query
        if ($conn->query($updateDL) === TRUE) {
     
            $updateHistoryDetail = "UPDATE history SET 
                DLCode = '$dlCode'
                WHERE licenseNumber = '$licenseNumber'";

            if ($conn->query($updateHistoryDetail) === TRUE) {
               
                $conn->commit();
                echo "Driver information updated successfully.";
                header('Location: driverLicense.php');
            } else {
                
                $conn->rollback();
                echo "Error updating driverlicense information: " . $conn->error;
            }
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
    <title>Update Driver License Information</title>
</head>
<body>
    <h2>Update Driver License Information</h2>
    <form action="editDriverLicense.php" method="POST">
        <div class="flex-container">
            <div>
                <label for="driverID">Driver ID:</label>
                <input type="text" id="driverID" name="driverID" value="<?php echo htmlspecialchars($driverID); ?>" readonly required>
            </div>
            <div>
                <label for="driverName">Name:</label>
                <input type="text" id="driverName" name="driverName" value="<?php echo htmlspecialchars($driverName); ?>" readonly required>
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
                <label for="issueDate">Issue Date:</label>
                <input type="date" id="issueDate" name="issueDate" required>
            </div>
            <div>
                <label for="expirationDate">Expiration Date:</label>
                <input type="date" id="expirationDate" name="expirationDate" required>
            </div>
            <div>
            <label for="conditionCode">Condition Code:</label>
                <select id="conditionCode" name="conditionCode" required>
                    <option value="">Select Type</option>
                    <option value="A/1">Condition A/1</option>
                    <option value="B/2">Condition B/2</option>
                    <option value="C/2">Condition C/2</option>
                    <option value="3">Condition 3</option>
                    <option value="D/4">Condition D/4</option>
                    <option value="E/5">Condition E/5</option>
                    <option value="None">None</option>
                </select>
            </div>
            <div>
            <label for="DLCode">DL Code:</label>
                <select id="dlCode" name="dlCode" required>
                    <option value="">Select DL Code</option>
                    <option value="R1">Motorbikes or motorized tricycles</option>
                    <option value="R2">Motor vehicle up to 4500 kg GVW</option>
                    <option value="R3">Motor vehicle above 4500 kg GVW</option>
                    <option value="R4">Automatic transmission up to 4500 kg GVW</option>
                    <option value="R5">Automatic transmission above 4500 kg GVW</option>
                    <option value="R6">Articulated Vehicle 1600 kg GVW & below</option>
                    <option value="R7">Articulated Vehicle 1601 kg up to 4500 kg GVW</option>
                    <option value="R8">Articulated Vehicle 4501 kg & above GVW</option>

                </select>
            </div>
        </div>
        <button name ="submit" type="submit">Update Driver License</button>
    </form>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 69d7af889dbfece1d90ec5d682645e938b7e01c3
