<?php
include 'DBConnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driverID = $_POST['driverID'];

    $sql = "SELECT * FROM User WHERE userID = '$driverID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $driver = $result->fetch_assoc();
    } else {
        echo "Driver not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $driverID = trim($_POST["driverID"]);
    $driverName = trim($_POST["driverName"]);
    $driverDOB = trim($_POST["driverDateOfBirth"]);
    $driverSex = trim($_POST["driverSex"]);
    $driverBloodType = trim($_POST["driverBloodType"]);
    $driverContact = trim($_POST["driverContact"]);
    $driverNationality = trim($_POST["driverNationality"]);
    $driverHeight = trim($_POST["driverHeight"]);
    $driverWeight = trim($_POST["driverWeight"]);
    $driverAddress = trim($_POST["driverAddress"]);

    if ($driverID != "" && $driverName != "" && $driverDOB != "" && $driverSex != "" && $driverBloodType != "" && $driverContact != "" && $driverNationality != "" && $driverHeight != "" && $driverWeight != "" && $driverAddress != "") {
        $conn->begin_transaction();

        $updateDriver = "UPDATE User SET 
            userName = '$driverName', 
            dateOfBirth = '$driverDOB', 
            sex = '$driverSex', 
            bloodType = '$driverBloodType', 
            contactNumber = '$driverContact', 
            nationality = '$driverNationality', 
            heightInCM = '$driverHeight', 
            weightInKG = '$driverWeight', 
            userAddress = '$driverAddress'
            WHERE userID = '$driverID'";

        if ($conn->query($updateDriver) === TRUE) {
            $updateDriverDL = "UPDATE driverLicense SET 
                driverName = '$driverName'
                WHERE userID = '$driverID'";

            $updateDriverH = "UPDATE history SET 
                driverNameH = '$driverName'
                WHERE userID = '$driverID'";

            if ($conn->query($updateDriverDL) === TRUE && $conn->query($updateDriverH) === TRUE) {
                $conn->commit();
                echo "Driver information updated successfully.";
                header('Location: driver.php'); 
             
                exit;
          
            } else {
                $conn->rollback();
                echo "Error updating driver license or history information: " . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Error updating driver information: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Driver Information</title>
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
            width: 50%;
            margin: 10px 55px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            width: 100%;
            margin: 20px auto;
        }
        h2 {
            font-size: 45px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
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
</head>
<body>
    <div class="container">
        <h2>Update Driver Information</h2>

        <form class = "container" method="post">
        <div class = "flex-container">
            <div>
            <input type="hidden" name="driverID" value="<?php echo htmlspecialchars($driver['userID']); ?>">
            </div>
            <div>
            <label for="driverName">Driver Name</label>
            <input type="text" name="driverName" value="<?php echo htmlspecialchars($driver['userName']); ?>" required>
            </div>
            <div>
            <label for="driverDateOfBirth">Date of Birth</label>
            <input type="date" name="driverDateOfBirth" value="<?php echo htmlspecialchars($driver['dateOfBirth']); ?>" required>
            </div>
            <div>
            <label for="driverSex">Sex</label>
            <select name="driverSex" required>
                <option value="" disabled>Select below</option>
                <option value="M" <?php echo ($driver['sex'] == 'M') ? 'selected' : ''; ?>>Male</option>
                <option value="F" <?php echo ($driver['sex'] == 'F') ? 'selected' : ''; ?>>Female</option>
                <option value="UKWN" <?php echo ($driver['sex'] == 'UKWN') ? 'selected' : ''; ?>>Unknown</option>
            </select>
            </div>
            <div>
            <label for="driverBloodType">Blood Type</label>
            <select name="driverBloodType" required>
                <option value="" disabled>Select below</option>
                <option value="AB+" <?php echo ($driver['bloodType'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                <option value="AB-" <?php echo ($driver['bloodType'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                <option value="A+" <?php echo ($driver['bloodType'] == 'A+') ? 'selected' : ''; ?>>A+</option>
                <option value="A-" <?php echo ($driver['bloodType'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                <option value="O+" <?php echo ($driver['bloodType'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                <option value="O-" <?php echo ($driver['bloodType'] == 'O-') ? 'selected' : ''; ?>>O-</option>
                <option value="B+" <?php echo ($driver['bloodType'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                <option value="B-" <?php echo ($driver['bloodType'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                <option value="UKNWN" <?php echo ($driver['bloodType'] == 'UKNWN') ? 'selected' : ''; ?>>Unknown</option>
            </select>
            </div>
            <div>
            <label for="driverContact">Contact Number</label>
            <input type="tel" name="driverContact" value="<?php echo htmlspecialchars($driver['contactNumber']); ?>" required>
            </div>
            <div>
            <label for="driverNationality">Nationality</label>
            <input type="text" name="driverNationality" value="<?php echo htmlspecialchars($driver['nationality']); ?>" required>
            </div>
            <div>
            <label for="driverWeight">Weight (kg)</label>
            <input type="number" name="driverWeight" value="<?php echo htmlspecialchars($driver['weightInKG']); ?>" required>
            </div>
            <div>
            <label for="driverHeight">Height (cm)</label>
            <input type="number" name="driverHeight" value="<?php echo htmlspecialchars($driver['heightInCM']); ?>" required>
            </div>
            <div>
            <label for="driverAddress">Address</label>
            <input type="text" name="driverAddress" value="<?php echo htmlspecialchars($driver['userAddress']); ?>" required>
            </div>


            </div>
           <div class="button-container">
                <button type="submit" name="update">Update Driver</button>
                <button type="button" onclick="window.location.href='driver.php'">Cancel</button>
            </div>
       
        </form>

</body>
</html>
