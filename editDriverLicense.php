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

        // Update driverLicense table
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


    } 
    $conn->close();

} else {
    echo "Error: Invalid request method.";
}
?>

<!-- 
    The Form which is used to update the driverLicense values.

    All informations are already displayed in the box except for 
    issue date, expiration date, conditon code, and DL code.
    
    All values cannot be updated except for the issue date, 
    expiration date, conditon code, and DL code.

 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Driver License Information</title>
</head>
<style>
        /* Body style */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        /* Container style */
        .container {
            width: 70%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form style */
        form {
            width: 100%;
            margin: 20px auto;
        }

        /* Title style */
        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        /* Label style */
        label {
            display: block;
            margin-bottom: 5px;
        }

        /* Input style */
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="tel"],
        select {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button style */
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Submit button style */
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 auto;
            display: block;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .flex-container > div {
            flex: 1;
            min-width: 45%;
            margin-bottom: 15px;
        }

        .button-container {
            text-align: right;
        }
    </style>
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
</html>
