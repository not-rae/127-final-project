<?php
include 'DBConnector.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driverID = $_POST['driverID'];
    $licenseNumber = $_POST['licenseNumber'];

    $sql = "SELECT * FROM user WHERE userID = '$driverID'";
    $result = $conn->query($sql);


    $sql1 = "SELECT * FROM driverLicense WHERE licenseNumber = '$licenseNumber'";
    $result1 = $conn->query($sql1);


    if ($result->num_rows > 0 && $result1->num_rows > 0) {
        $driver = $result->fetch_assoc();
        $driverLicense = $result1->fetch_assoc();
    } else {
        echo "Driver not found.";
        exit;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
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
            userID = '$driverID', 
            driverName = '$driverName', 
            agencyCode = '$agencyCode', 
            issueDate = '$issueDate', 
            expirationDate = '$expirationDate', 
            conditionCode = '$conditionCode', 
            DLCode = '$dlCode'
            WHERE licenseNumber = '$licenseNumber'";

        // update history details
        if ($conn->query($updateDL) === TRUE) {
            $updateHistoryDetail = "UPDATE history SET 
                DLCode = '$dlCode'
                WHERE licenseNumber = '$licenseNumber'";
            if ($conn->query($updateHistoryDetail) === TRUE) {
                $conn->commit();
                echo "Driver information updated successfully.";
                header('Location: driverLicense.php'); 
                exit;
               
            }
            
            else {
                $conn->rollback();
                echo "Error updating information: " . $conn->error;
            }

        } 
        
        else {
            $conn->rollback();
            echo "Error updating information: " . $conn->error;
        }
    } 
    $conn->close();

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
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
        }

        /* Container style */
        .container {
            width: 50%;
            height: 30%;
            margin: 10px 55px;
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
            font-size: 45px;
            margin-bottom: 20px;

        }

        /* Label style */
        label {
            display: block;
            margin-bottom: 5px;
        }

        #driverName,
        #licenseNumber,
        #agencyCode,
        #driverID {
            background-color: #c7f9cc;
        }

        input[type="text"] {
            width: 83%;
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
        input[type="date"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button style */
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 1rem 0 0 1rem;
        }

        button:hover {
            background-color: red;
        }

        /* Submit button style */
        input[type="submit"] {
            font-size: 18px;
            padding: 18px 40px;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 30px auto;
            display: block;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
    </style>
<body>
    <h2>Update Driver License Information</h2>
    <form class="container" method="POST">
        <div class="flex-container">
            <div>
                <label for="driverID">Driver ID:</label>
                <input type="text" id="driverID" name="driverID" value="<?php echo htmlspecialchars($driver['userID']); ?>" readonly required>
            </div>
            <div>
                <label for="driverName"> Driver Name:</label>
                <input type="text" id="driverName" name="driverName" value="<?php echo htmlspecialchars($driver['userName']); ?>" readonly required>
            </div>
            <div>
                <label for="licenseNumber">License Number:</label>
                <input type="text" id="licenseNumber" name="licenseNumber" value="<?php echo htmlspecialchars($driverLicense['licenseNumber']); ?>" readonly required>
            </div>
            <div>
            <label for="agencyCode">Agency Code:</label>
                <input type="text" id="agencyCode" name="agencyCode" value="<?php echo htmlspecialchars($driverLicense['agencyCode']); ?>" readonly required>
            </div>
            <div>
                <label for="issueDate">Issue Date:</label>
                <input type="date" id="issueDate" name="issueDate" value="<?php echo htmlspecialchars($driverLicense['issueDate']); ?>" required>
            </div>
            <div>
                <label for="expirationDate">Expiration Date:</label>
                <input type="date" id="expirationDate" name="expirationDate" value="<?php echo htmlspecialchars($driverLicense['expirationDate']); ?>" required>
            </div>
            <div>
            <label for="conditionCode">Condition Code:</label>
                <select id="conditionCode" name="conditionCode" required>
                    <option value="" disabled>Select Type</option>
                    <option value="A/1" <?php echo ($driverLicense['conditionCode'] == 'A/1') ? 'selected' : ''; ?>>Condition A/1</option>
                    <option value="B/2" <?php echo ($driverLicense['conditionCode']  == 'B/2') ? 'selected' : ''; ?>>Condition B/2</option>
                    <option value="C/2" <?php echo ($driverLicense['conditionCode']  == 'C/2') ? 'selected' : ''; ?>>Condition C/2</option>
                    <option value="3" <?php echo ($driverLicense['conditionCode']  == '3') ? 'selected' : ''; ?>>Condition 3</option>
                    <option value="D/4" <?php echo ($driverLicense['conditionCode']  == 'D/4') ? 'selected' : ''; ?>>Condition D/4</option>
                    <option value="E/5" <?php echo ($driverLicense['conditionCode'] == 'E/5') ? 'selected' : ''; ?>>Condition E/5</option>
                    <option value="None" <?php echo ($driverLicense['conditionCode']  == 'None') ? 'selected' : ''; ?>>None</option>
                </select>
            </div>
            <div>
            <label for="DLCode">DL Code:</label>
                <select id="dlCode" name="dlCode" required>
                    <option value="" disabled>Select DL Code</option>
                    <option value="R1" <?php echo ($driverLicense['DLCode']  == 'R1') ? 'selected' : ''; ?>>Motorbikes or motorized tricycles</option>
                    <option value="R2" <?php echo ($driverLicense['DLCode']  == 'R2') ? 'selected' : ''; ?>>Motor vehicle up to 4500 kg GVW</option>
                    <option value="R3" <?php echo ($driverLicense['DLCode']  == 'R3') ? 'selected' : ''; ?>>Motor vehicle above 4500 kg GVW</option>
                    <option value="R4" <?php echo ($driverLicense['DLCode']  == 'R4') ? 'selected' : ''; ?>>Automatic transmission up to 4500 kg GVW</option>
                    <option value="R5" <?php echo ($driverLicense['DLCode']  == 'R5') ? 'selected' : ''; ?>>Automatic transmission above 4500 kg GVW</option>
                    <option value="R6" <?php echo ($driverLicense['DLCode']  == 'R6') ? 'selected' : ''; ?>>Articulated Vehicle 1600 kg GVW & below</option>
                    <option value="R7" <?php echo ($driverLicense['DLCode']  == 'R7') ? 'selected' : ''; ?>>Articulated Vehicle 1601 kg up to 4500 kg GVW</option>
                    <option value="R8" <?php echo ($driverLicense['DLCode']  == 'R8') ? 'selected' : ''; ?>>Articulated Vehicle 4501 kg & above GVW</option>
                </select>
            </div>
        </div>
        <button type="submit" name="update">Update Driver License</button>
        <button  type="button" onclick="window.location.href='driverLicense.php'">Cancel</button>
    </form>
</body>
</html>
