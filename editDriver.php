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

        /* Container style */
        .container {
            width: 50%;
            height: auto;
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

        #driverID {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #c7f9cc;
        }
        
        #driverName,
        #driverAddress {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        input[type="number"] {
            width: 83%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="tel"] {
            width: 83%;
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
    <h2>Update Driver Information</h2>
    <form  class="container" action="editDriver.php" method="POST">
        <label for="driverID">Driver ID:</label>
        <input type="text" id="driverID" name="driverID" value="<?php echo htmlspecialchars($driverID); ?>" readonly required>
        <label for="driverName">Driver Name:</label>
        <input type="text" id="driverName" name="driverName" value="<?php echo htmlspecialchars($driverName); ?>" required>
        <label for="driverAddress">Address:</label>
        <input type="text" id="driverAddress" name="driverAddress" value="<?php echo htmlspecialchars($driverAddress); ?>"required>
        <div class="flex-container">
            <div>
                <label for="driverDateOfBirth">Date of Birth:</label>
                <input type="date" id="driverDateOfBirth" name="driverDateOfBirth"  required>
            </div>
            <div>
                <label for="driverSex">Sex:</label>
                <select id="driverSex" name="driverSex"  required>
                <option value="" disabled>Select below</option>
                    <option value="M" <?php echo ($driverSex == 'M') ? 'selected' : ''; ?>>Male</option>
                    <option value="F" <?php echo ($driverSex == 'F') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div>
                <label for="driverBloodType">Blood Type:</label>
                <select id="driverBloodType" name="driverBloodType"  required>
                <option value="" disabled>Select below</option>
                    <option value="AB+" <?php echo ($driverBloodType == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                    <option value="AB-" <?php echo ($driverBloodType == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                    <option value="A+" <?php echo ($driverBloodType== 'A+') ? 'selected' : ''; ?>>A+</option>
                    <option value="A-" <?php echo ($driverBloodType== 'A-') ? 'selected' : ''; ?>>A-</option>
                    <option value="O+" <?php echo ($driverBloodType== 'O+') ? 'selected' : ''; ?>>O+</option>
                    <option value="O-" <?php echo ($driverBloodType== 'O-') ? 'selected' : ''; ?>>O-</option>
                    <option value="B+" <?php echo ($driverBloodType== 'B+') ? 'selected' : ''; ?>>B+</option>
                    <option value="B-" <?php echo ($driverBloodType== 'B-') ? 'selected' : ''; ?>>B-</option>
                    <option value="UKNWN" <?php echo ($driverBloodType == 'UKNWN') ? 'selected' : ''; ?>>Unknown</option>
                </select>
            </div>
            <div>
                <label for="driverContact">Contact Number:</label>
                <input type="tel" id="driverContact" name="driverContact" value="<?php echo htmlspecialchars($driverContact); ?>"required>
            </div>
        </div>

        <div class="flex-container">
            <div>
                <label for="driverNationality">Nationality:</label>
                <input type="text" id="driverNationality" name="driverNationality" value="<?php echo htmlspecialchars($driverNationality); ?>"required>
            </div>
            <div>
                <label for="driverWeight">Weight (kg):</label>
                <input type="number" id="driverWeight" name="driverWeight" value="<?php echo htmlspecialchars($driverWeight); ?>"required>
            </div>
            <div>
                <label for="driverHeight">Height (cm):</label>
                <input type="number" id="driverHeight" name="driverHeight" value="<?php echo htmlspecialchars($driverHeight); ?>"required>
            </div>
        </div>


        <button name ="submit" type="submit">Update Driver</button>
        <button onclick="window.location.href='driver.php'">Cancel</button>

    </form>
</body>
</html>
