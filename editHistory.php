<?php
include 'DBConnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reportID = $_POST['reportID'];

    $sql = "SELECT h.plateNumber, h.ownerNameH, h.driverNameH, h.licenseNumber, h.agencyCode, h.DLCode, rv.violationID, r.violationDate 
            FROM history h 
            JOIN rep_vio rv ON h.reportID = rv.reportID
            JOIN report r ON h.reportID = r.reportID
            WHERE h.reportID = '$reportID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $history = $result->fetch_assoc();
    } else {
        echo "Cannot edit history. User does not exist.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {

    $reportID = isset($_POST["reportID"]) ? trim($_POST["reportID"]) : '';
    $violationID = isset($_POST["violationID"]) ? trim($_POST["violationID"]) : '';
    $violationDate = isset($_POST["violationDate"]) ? trim($_POST["violationDate"]) : '';

    if ($reportID != "" && $violationID != "" && $violationDate != "") {
        $conn->begin_transaction();

        $updateHistory = "UPDATE history SET 
            violationID = '$violationID', 
            violationDate = '$violationDate'
            WHERE reportID = '$reportID'";

        if ($conn->query($updateHistory) === TRUE) {
            $update_rep_vio = "UPDATE rep_vio SET
             violationID = '$violationID'
             WHERE reportID = '$reportID'";

            $updateReport = "UPDATE report SET
             violationID = '$violationID',
             violationDate = '$violationDate'
             WHERE reportID = '$reportID'";

            if ($conn->query($update_rep_vio) === TRUE && $conn->query($updateReport) === TRUE) {
                $conn->commit();
                header("Location: history.php");
                exit;

            } else {
                $conn->rollback();
                echo "Error updating information: " . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Error updating history: " . $conn->error;
        }
    } 

    $conn->close();
}
?>

<!-- 
    The Form which is used to update the history values.

    All informations are already displayed in the box except for 
    recent violation date
    
    All values cannot be updated except for the number of violations
    and recent violation date. 

 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update History Information</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #ffffff;
    }
    .container {
        width: 40%;
        align-items: center;
        background-color: #fff;
        padding: 25px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    }
    h2 {
        font-size: 45px;
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    #ownername,
    #driverName{
        width: 95%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    #plateNumber,
    #driverNameH,
    #licenseNumber,
    #agencyCode,
    #DLCode,
    #reportID,
    #ownerNameH {
        background-color: #c7f9cc;
    }
    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="tel"] {
        width: 97%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
</style>
<body>
    <h2>Update History Information</h2>
    <div class="container">
        <form method="POST">
            <label for="plateNumber">Plate Number:</label>
            <input type="text" id="plateNumber" name="plateNumber" value="<?php echo htmlspecialchars($history['plateNumber']); ?>" readonly required>
            <label for="ownerNameH">Owner Name:</label>
            <input type="text" id="ownerNameH" name="ownerNameH" value="<?php echo htmlspecialchars($history['ownerNameH']); ?>" readonly required>
            <label for="driverNameH">Driver Name:</label>
            <input type="text" id="driverNameH" name="driverNameH" value="<?php echo htmlspecialchars($history['driverNameH']); ?>" readonly required>
            <label for="licenseNumber">License Number:</label>
            <input type="text" id="licenseNumber" name="licenseNumber" value="<?php echo htmlspecialchars($history['licenseNumber']); ?>" readonly required>
            <label for="DLCode">DL Code:</label>
            <input type="text" id="DLCode" name="DLCode" value="<?php echo htmlspecialchars($history['DLCode']); ?>" readonly required>
            <label for="agencyCode">Agency Code:</label>
            <input type="text" id="agencyCode" name="agencyCode" value="<?php echo htmlspecialchars($history['agencyCode']); ?>" readonly required>
            <label for="reportID">Report ID:</label>
            <input type="text" id="reportID" name="reportID" value="<?php echo htmlspecialchars($reportID); ?>" readonly required>
            <label for="violationID">Violation/s:</label>
            <select id="violationID" name="violationID" required>
                <option value="" disabled selected>Select below</option>
                <option value="V001" <?php echo ($history['violationID'] == 'V001') ? 'selected' : ''; ?>>Smoke Belching</option>
                <option value="V002" <?php echo ($history['violationID'] == 'V002') ? 'selected' : ''; ?>>Driving While Intoxicated/Drugged</option>
                <option value="V003" <?php echo ($history['violationID'] == 'V003') ? 'selected' : ''; ?>>Disregarding Traffic Signs</option>
                <option value="V004" <?php echo ($history['violationID'] == 'V004') ? 'selected' : ''; ?>>Jalouses</option>
                <option value="V005" <?php echo ($history['violationID'] == 'V005') ? 'selected' : ''; ?>>Reckless Driving</option>
            </select>
            <label for="violationDate">Recent Date of Violation/s:</label>
            <input type="date" id="violationDate" name="violationDate" value="<?php echo htmlspecialchars($history['violationDate']); ?>" required>
            <div class="button-container">
                <button type="submit" name="update">Update History</button>
                <button type="button" onclick="window.location.href='history.php'">Cancel</button>
            </div>      
        </form>
    </div>
</body>
</html>