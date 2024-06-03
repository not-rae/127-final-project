<?php
include 'DBConnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ownerID = $_POST['ownerID'];
    $sql = "SELECT * FROM User WHERE userID = '$ownerID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $owner = $result->fetch_assoc();
    } else {
        echo "Owner not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $ownerID = trim($_POST["ownerID"]);
    $ownerName = trim($_POST["ownerName"]);
    $ownerDateOfBirth = trim($_POST["ownerDateOfBirth"]);
    $ownerSex = trim($_POST["ownerSex"]);
    $ownerBloodType = trim($_POST["ownerBloodType"]);
    $ownerContact = trim($_POST["ownerContact"]);
    $ownerNationality = trim($_POST["ownerNationality"]);
    $ownerHeight = trim($_POST["ownerHeight"]);
    $ownerWeight = trim($_POST["ownerWeight"]);
    $ownerAddress = trim($_POST["ownerAddress"]);

    if ($ownerID != "" && $ownerName != "" && $ownerDateOfBirth != "" && $ownerSex != "" && $ownerBloodType != "" && $ownerContact != "" && $ownerNationality != "" && $ownerHeight != "" && $ownerWeight != "" && $ownerAddress != "") {
        $conn->begin_transaction();

        $updateOwner = "UPDATE User SET 
            userName = '$ownerName', 
            dateOfBirth = '$ownerDateOfBirth', 
            sex = '$ownerSex', 
            bloodType = '$ownerBloodType', 
            contactNumber = '$ownerContact', 
            nationality = '$ownerNationality', 
            heightInCM = '$ownerHeight', 
            weightInKG = '$ownerWeight', 
            userAddress = '$ownerAddress'
            WHERE userID = '$ownerID'";

        if ($conn->query($updateOwner) === TRUE) {
            $updateOwnerV = "UPDATE Vehicle SET 
                ownerName = '$ownerName'
                WHERE userID = '$ownerID'";

            $updateOwnerH = "UPDATE history SET 
                ownerNameH = '$ownerName'
                WHERE userID = '$ownerID'";

            if ($conn->query($updateOwnerV) === TRUE && $conn->query($updateOwnerH) === TRUE) {
                $conn->commit();
                header("Location: owner.php");
                exit();
            } else {
                $conn->rollback();
                echo "Error updating vehicle or history information: " . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Error updating user information.";
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
    <title>Update Owner Information</title>
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
    <div class="container">
        <h2>Update Owner Information</h2>
        <form method="post">
            <input type="hidden" name="ownerID" value="<?php echo htmlspecialchars($owner['userID']); ?>">
            <label for="ownerName">Driver Name</label>
            <input type="text" name="ownerName" value="<?php echo htmlspecialchars($owner['userName']); ?>" required>
            <label for="ownerDateOfBirth">Date of Birth</label>
            <input type="date" name="ownerDateOfBirth" value="<?php echo htmlspecialchars($owner['dateOfBirth']); ?>" required>
            <label for="ownerAddress">Address</label>
            <input type="text" name="ownerAddress" value="<?php echo htmlspecialchars($owner['userAddress']); ?>" required>
            <label for="ownerSex">Sex</label>
            <select name="ownerSex" required>
                <option value="" disabled>Select below</option>
                <option value="M" <?php echo ($owner['sex'] == 'M') ? 'selected' : ''; ?>>Male</option>
                <option value="F" <?php echo ($owner['sex'] == 'F') ? 'selected' : ''; ?>>Female</option>
                <option value="UKWN" <?php echo ($owner['sex'] == 'UKWN') ? 'selected' : ''; ?>>Unknown</option>
            </select>
            <label for="ownerBloodType">Blood Type</label>
            <select name="ownerBloodType" required>
                <option value="" disabled>Select below</option>
                <option value="AB+" <?php echo ($owner['bloodType'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                <option value="AB-" <?php echo ($owner['bloodType'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                <option value="A+" <?php echo ($owner['bloodType'] == 'A+') ? 'selected' : ''; ?>>A+</option>
                <option value="A-" <?php echo ($owner['bloodType'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                <option value="O+" <?php echo ($owner['bloodType'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                <option value="O-" <?php echo ($owner['bloodType'] == 'O-') ? 'selected' : ''; ?>>O-</option>
                <option value="B+" <?php echo ($owner['bloodType'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                <option value="B-" <?php echo ($owner['bloodType'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                <option value="UKNWN" <?php echo ($owner['bloodType'] == 'UKNWN') ? 'selected' : ''; ?>>Unknown</option>
            </select>
            <label for="ownerContact">Contact Number</label>
            <input type="tel" name="ownerContact" value="<?php echo htmlspecialchars($owner['contactNumber']); ?>" required>
            <label for="ownerNationality">Nationality</label>
            <input type="text" name="ownerNationality" value="<?php echo htmlspecialchars($owner['nationality']); ?>" required>
            <label for="ownerWeight">Weight (kg)</label>
            <input type="number" name="ownerWeight" value="<?php echo htmlspecialchars($owner['weightInKG']); ?>" required>
            <label for="ownerHeight">Height (cm)</label>
            <input type="number" name="ownerHeight" value="<?php echo htmlspecialchars($owner['heightInCM']); ?>" required>
            <div class="button-container">
                <button type="submit" name="update">Update Owner</button>
                <button type="button" onclick="window.location.href='owner.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
