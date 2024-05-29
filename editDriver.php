<?php
// Database connection
include 'DBConnector.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data and sanitize it
    $driverID = isset($_POST["driverID"]) ? trim($_POST["driverID"]) : '';
    $driverName = isset($_POST["driverName"]) ? trim($_POST["driverName"]) : '';
    $driverDOB = isset($_POST["driverDateOfBirth"]) ? trim($_POST["driverDateOfBirth"]) : '';
    $driverSex = isset($_POST["driverSex"]) ? trim($_POST["driverSex"]) : '';
    $driverBloodType = isset($_POST["driverBloodType"]) ? trim($_POST["driverBloodType"]) : '';
    $driverContact = isset($_POST["driverContact"]) ? trim($_POST["driverContact"]) : '';
    $driverNationality = isset($_POST["driverNationality"]) ? trim($_POST["driverNationality"]) : '';
    $driverWeight = isset($_POST["driverWeight"]) ? trim($_POST["driverWeight"]) : '';
    $driverHeight = isset($_POST["driverHeight"]) ? trim($_POST["driverHeight"]) : '';
    $driverAddress = isset($_POST["driverAddress"]) ? trim($_POST["driverAddress"]) : '';

    // Validate that all required fields are filled out
    if ($driverID != "" && $driverName != "" && $driverDOB != "" && $driverSex != "" && $driverBloodType != "" && $driverContact != "" && $driverNationality != "" && $driverWeight != "" && $driverHeight != "" && $driverAddress != "") {

        // Start transaction
        $conn->begin_transaction();

        // Update carDriver table
        $updateDriver = "UPDATE carDriver SET 
            driverName = '$driverName', 
            dateOfBirth = '$driverDOB', 
            sex = '$driverSex', 
            bloodType = '$driverBloodType', 
            contactNumber = '$driverContact', 
            nationality = '$driverNationality', 
            heightInCM = '$driverHeight', 
            weightInKG = '$driverWeight', 
            driverAddress = '$driverAddress'
            WHERE driverID = '$driverID'";

        // Execute the query
        // Update driverLicense table
        if ($conn->query($updateDriver) === TRUE) {
            $updateDriverDL = "UPDATE driverlicense SET 
                driverNameDL = '$driverName'
                WHERE driverID = '$driverID'";

            // Execute the query
            if ($conn->query($updateDriverDL) === TRUE) {
                // Commit the transaction
                $conn->commit();
                echo "Driver information updated successfully.";
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

        // Execute the query
        // update vehicle records
        if ($conn->query($updateDriver) === TRUE) {
            $updateDriverV = "UPDATE Vehicle SET 
                driverNameV = '$driverName'
                WHERE driverID = '$driverID'";

            // Execute the query
            if ($conn->query($updateDriverV) === TRUE) {
                // Commit the transaction
                $conn->commit();
                echo "Driver information updated successfully.";
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

        // update histoy records
        if ($conn->query($updateDriver) === TRUE) {
            $updateDriverH = "UPDATE history SET 
                driverNameH = '$driverName'
                WHERE driverID = '$driverID'";

            // Execute the query
            if ($conn->query($updateDriverH) === TRUE) {
                // Commit the transaction
                $conn->commit();
                echo "Driver information updated successfully.";
                header("Location: driver.php");
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
    <title>Update Driver Information</title>
</head>
<body>
    <h2>Update Driver Information</h2>
    <form action="editDriver.php" method="POST">
        <div class="flex-container">
            <div>
                <label for="driverID">Driver ID:</label>
                <input type="text" id="driverID" name="driverID" value="<?php echo htmlspecialchars($driverID); ?>" readonly required>
            </div>
            <div>
                <label for="driverName">Name:</label>
                <input type="text" id="driverName" name="driverName" required>
            </div>
            <div>
                <label for="driverDateOfBirth">Date of Birth:</label>
                <input type="date" id="driverDateOfBirth" name="driverDateOfBirth" required>
            </div>
            <div>
                <label for="driverSex">Sex:</label>
                <select id="driverSex" name="driverSex" required>
                    <option value="" disabled selected>Select below</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="UKWN">Unknown</option>
                </select>
            </div>
            <div>
                <label for="driverBloodType">Blood Type:</label>
                <select id="driverBloodType" name="driverBloodType" required>
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
                <label for="driverContact">Contact Number:</label>
                <input type="tel" id="driverContact" name="driverContact" required>
            </div>
        </div>

        <div class="flex-container">
            <div>
                <label for="driverNationality">Nationality:</label>
                <input type="text" id="driverNationality" name="driverNationality" required>
            </div>
            <div>
                <label for="driverWeight">Weight (kg):</label>
                <input type="number" id="driverWeight" name="driverWeight" required>
            </div>
            <div>
                <label for="driverHeight">Height (cm):</label>
                <input type="number" id="driverHeight" name="driverHeight" required>
            </div>
        </div>

        <label for="driverAddress">Address:</label>
        <input type="text" id="driverAddress" name="driverAddress" required>

        <button name ="submit" type="submit">Update Driver</button>
    </form>
</body>
</html>
