<!-- 
    This is responsible for updating the necessary information on the carowner table.
    
 -->

<?php

include 'DBConnector.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data and remove whitespaces
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

       
        $conn->begin_transaction();

        // Update carowner table
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

            //Update the vehicle table
            $updateOwnerV = "UPDATE Vehicle SET 
                ownerNameV = '$ownerName'
                WHERE ownerID = '$ownerID'";

            // Execute the query
            if ($conn->query($updateOwnerV) === TRUE) {
                // Commit the transaction
                $conn->commit();
                header("Location: owner.php");
                exit;

            } else {
                // Rollback the transaction if there was an error
                $conn->rollback();
                error_log("Error updating Vehicle information: " . $conn->error);
                echo "Error updating Vehicle information.";
            }
        } else {
            // Rollback the transaction if there was an error
            $conn->rollback();
            error_log("Error updating carOwner information: " . $conn->error);
            echo "Error updating carOwner information.";
        }

    } else {
        echo "Error: All fields are required.";
    }

    $conn->close();

} else {
    echo "Error: Invalid request method.";
}
?>

<!-- 
    The Form which is used to update the carowner values.

    All informations are already displayed in the box except for 
    date of birth, sex, and blood type.

    The ownerID cannot be updated. 

 -->


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
                <input type="text" id="ownerName" name="ownerName" value="<?php echo htmlspecialchars($ownerName); ?>"required>
                </div>
            <div>
                <label for="ownerDateOfBirth">Date of Birth:</label>
                <input type="date" id="ownerDateOfBirth" name="ownerDateOfBirth"  required>
            </div>
            <div>
                <label for="ownerSex">Sex:</label>
                <select id="ownerSex" name="ownerSex"  required >
                    <option value="" disabled selected>Select below</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="UKWN">Unknown</option>
                </select>
            </div>
            <div>
                <label for="ownerBloodType">Blood Type:</label>
                <select id="ownerBloodType" name="ownerBloodType"  required>
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
                <input type="tel" id="ownerContact" name="ownerContact" value="<?php echo htmlspecialchars($ownerContact); ?>" required>
            </div>
        </div>

        <div class="flex-container">
            <div>
                <label for="ownerNationality">Nationality:</label>
                <input type="text" id="ownerNationality" name="ownerNationality" value="<?php echo htmlspecialchars($ownerNationality); ?>"required>
            </div>
            <div>
                <label for="ownerWeight">Weight (kg):</label>
                <input type="number" id="ownerWeight" name="ownerWeight"  value="<?php echo htmlspecialchars($ownerWeight); ?>" required>
            </div>
            <div>
                <label for="ownerHeight">Height (cm):</label>
                <input type="number" id="ownerHeight" name="ownerHeight"  value="<?php echo htmlspecialchars($ownerHeight); ?>" required>
            </div>
        </div>

        <label for="ownerAddress">Address:</label>
        <input type="text" id="ownerAddress" name="ownerAddress" value="<?php echo htmlspecialchars($ownerAddress); ?>" required>
    </div>   
        <button name ="submit" type="submit">Update Owner</button>
    </form>
</body>
</html>
