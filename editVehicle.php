<?php
// Database connection
include 'DBConnector.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    $ownerID = isset($_POST["vehiclePlateNumber"]) ? trim($_POST["vehiclePlateNumber"]) : '';
    $ownerName = isset($_POST["ownerID"]) ? trim($_POST["ownerID"]) : '';
    $ownerDateOfBirth = isset($_POST["ownerName"]) ? trim($_POST["ownerName"]) : '';
    $ownerSex = isset($_POST["driverID"]) ? trim($_POST["driverID"]) : '';
    $ownerBloodType = isset($_POST["driverName"]) ? trim($_POST["driverName"]) : '';
    $ownerContact = isset($_POST["registrationDateV"]) ? trim($_POST["registrationDateV"]) : '';
    $ownerAddress = isset($_POST["expirationDateV"]) ? trim($_POST["expirationDateV"]) : '';
    $ownerNationality = isset($_POST["manufacturer"]) ? trim($_POST["manufacturer"]) : '';
    $ownerHeight = isset($_POST["model"]) ? trim($_POST["model"]) : '';
    $ownerWeight = isset($_POST["color"]) ? trim($_POST["color"]) : '';



    if ($ownerID != "" && $ownerName != "" && $ownerDateOfBirth != "" && $ownerSex != "" && $ownerBloodType != "" && $ownerContact != "" && $ownerNationality != "" && $ownerHeight != "" && $ownerWeight != "" && $ownerAddress != "") {

    
        $conn->begin_transaction();

       
        $updateOwner = "UPDATE carOwner SET 
            ownerName = '$ownerName', 
            dateOfBirth = '$ownerDateOfBirth', 
            sex = '$ownerSex', 
            bloodType = '$ownerBloodType', 
            contactNumber = '$ownerContact', 
            nationality = '$ownerNationality', 
            heightInCM = '$ownerHeight', 
            weightInKG = '$ownerWeight', 
            ownerAddress = '$ownerAddress'
            WHERE ownerID = '$ownerID'";

    
        if ($conn->query($updateOwner) === TRUE) {
            $updateOwnerV = "UPDATE Vehicle SET 
                ownerNameV = '$ownerName'
                WHERE ownerID = '$ownerID'";

     
            if ($conn->query($updateOwnerV) === TRUE) {
                // Commit the transaction
                $conn->commit();
                echo "Owner information updated successfully.";
                header("Location: owner.php");
                exit;
            } else {
                // Rollback the transaction if there was an error
                $conn->rollback();
                echo "Error updating driverlicense information: " . $conn->error;
            }
        } else {
            // Rollback the transaction if there was an error
            $conn->rollback();
            echo "Error updating carDriver information: " . $conn->error;
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
    <title>Update Owner Information</title>
</head>
<body>
    <h2>Update Owner Information</h2>
    <form action="editOwner.php" method="POST">
    <div class="flex-container">
            <div>
                <label for="ownerID">Owner ID:</label>
                <input type="text" id="ownerID" name="ownerID" value="<?php echo htmlspecialchars($ownerID); ?>" readonly required>
            </div>
                <div>
                <label for="ownerName">Name:</label>
                <input type="text" id="ownerName" name="ownerName" required>
                </div>
            <div>
                <label for="ownerDateOfBirth">Date of Birth:</label>
                <input type="date" id="ownerDateOfBirth" name="ownerDateOfBirth" required>
            </div>
            <div>
                <label for="ownerSex">Sex:</label>
                <select id="ownerSex" name="ownerSex" required>
                    <option value="" disabled selected>Select below</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="UKWN">Unknown</option>
                </select>
            </div>
            <div>
                <label for="ownerBloodType">Blood Type:</label>
                <select id="ownerBloodType" name="ownerBloodType" required>
                    <option value="" disabled selected>Select below</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="UKNWN">Unknown</option>
                </select>
            </div>
            <div>
                <label for="ownerContact">Contact Number:</label>
                <input type="tel" id="ownerContact" name="ownerContact" required>
            </div>
        </div>

        <div class="flex-container">
            <div>
                <label for="ownerNationality">Nationality:</label>
                <input type="text" id="ownerNationality" name="ownerNationality" required>
            </div>
            <div>
                <label for="ownerWeight">Weight (kg):</label>
                <input type="number" id="ownerWeight" name="ownerWeight" required>
            </div>
            <div>
                <label for="ownerHeight">Height (cm):</label>
                <input type="number" id="ownerHeight" name="ownerHeight" required>
            </div>
            <div>
                <label for="noOfVehiclesOwned">Number of Vehicles Owned:</label>
                <input type="number" id="noOfVehiclesOwned" name="noOfVehiclesOwned" required>
            </div>
        </div>

        <label for="ownerAddress">Address:</label>
        <input type="text" id="ownerAddress" name="ownerAddress" required>
    </div>   
        <button name ="submit" type="submit">Update Owner</button>
    </form>
</body>
</html>
