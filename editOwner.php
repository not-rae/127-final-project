<?php
// Database connection
include 'DBConnector.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data and sanitize it
    $ownerID = isset($_POST["ownerID"]) ? trim($_POST["ownerID"]) : '';
    $ownerName = isset($_POST["ownerName"]) ? trim($_POST["ownerName"]) : '';
    $ownerDateOfBirth = isset($_POST["ownerDateOfBirth"]) ? trim($_POST["ownerDateOfBirth"]) : '';
    $ownerSex = isset($_POST["ownerSex"]) ? trim($_POST["ownerSex"]) : '';
    $ownerBloodType = isset($_POST["ownerBloodType"]) ? trim($_POST["ownerBloodType"]) : '';
    $ownerContact = isset($_POST["ownerContact"]) ? trim($_POST["ownerContact"]) : '';
    $ownerNationality = isset($_POST["ownerNationality"]) ? trim($_POST["ownerNationality"]) : '';
    $ownerHeight = isset($_POST["ownerHeight"]) ? trim($_POST["ownerHeight"]) : '';
    $ownerWeight = isset($_POST["ownerWeight"]) ? trim($_POST["ownerWeight"]) : '';
    $ownerAddress = isset($_POST["ownerAddress"]) ? trim($_POST["ownerAddress"]) : '';

    // Validate that all required fields are filled out
    if ($ownerID != "" && $ownerName != "" && $ownerDateOfBirth != "" && $ownerSex != "" && $ownerBloodType != "" && $ownerContact != "" && $ownerNationality != "" && $ownerHeight != "" && $ownerWeight != "" && $ownerAddress != "") {

        // Start transaction
        $conn->begin_transaction();

        // Update carDriver table
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

        // Execute the query
        if ($conn->query($updateOwner) === TRUE) {
            $updateOwnerV = "UPDATE Vehicle SET 
                ownerNameV = '$ownerName'
                WHERE ownerID = '$ownerID'";

            // Execute the query
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
