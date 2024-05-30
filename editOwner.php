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
                    error_log("Error updating information: " . $conn->error);
                    echo "Error updating information.";
                }
            } else {
                // Rollback the transaction if there was an error
                $conn->rollback();
                error_log("Error updating information: " . $conn->error);
                echo "Error updating information.";
            }
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

        #ownerID {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #c7f9cc;
        }

        #ownerName,
        #ownerAddress {
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
    <h2>Update Owner Information</h2>
    <form class="container" action="editOwner.php" method="POST">
        <label for="ownerID">Owner ID:</label>
        <input type="text" id="ownerID" name="ownerID" value="<?php echo htmlspecialchars($ownerID); ?>" readonly required>
        <label for="ownerName">Owner Name:</label>
        <input type="text" id="ownerName" name="ownerName" value="<?php echo htmlspecialchars($ownerName); ?>"required>
        <label for="ownerAddress">Address:</label>
        <input type="text" id="ownerAddress" name="ownerAddress" value="<?php echo htmlspecialchars($ownerAddress); ?>" required>
        <div class="flex-container">
            <div>
                <label for="ownerDateOfBirth">Date of Birth:</label>
                <input type="date" id="ownerDateOfBirth" name="ownerDateOfBirth"  required>
            </div>
            <div>
                <label for="ownerSex">Sex:</label>
                <select id="ownerSex" name="ownerSex" required>
                    <option value="" disabled>Select below</option>
                    <option value="M" <?php echo ($ownerSex == 'M') ? 'selected' : ''; ?>>Male</option>
                    <option value="F" <?php echo ($ownerSex == 'F') ? 'selected' : ''; ?>>Female</option>
                    <option value="UKWN" <?php echo ($ownerSex == 'UKWN') ? 'selected' : ''; ?>>Unknown</option>
                </select>
            </div>
            <div>
                <label for="ownerBloodType">Blood Type:</label>
                <select id="ownerBloodType" name="ownerBloodType" required>
                    <option value="" disabled>Select below</option>
                    <option value="AB+" <?php echo ($ownerBloodType == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                    <option value="AB-" <?php echo ($ownerBloodType == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                    <option value="A+" <?php echo ($ownerBloodType == 'A+') ? 'selected' : ''; ?>>A+</option>
                    <option value="A-" <?php echo ($ownerBloodType == 'A-') ? 'selected' : ''; ?>>A-</option>
                    <option value="O+" <?php echo ($ownerBloodType == 'O+') ? 'selected' : ''; ?>>O+</option>
                    <option value="O-" <?php echo ($ownerBloodType == 'O-') ? 'selected' : ''; ?>>O-</option>
                    <option value="B+" <?php echo ($ownerBloodType == 'B+') ? 'selected' : ''; ?>>B+</option>
                    <option value="B-" <?php echo ($ownerBloodType == 'B-') ? 'selected' : ''; ?>>B-</option>
                    <option value="UKNWN" <?php echo ($ownerBloodType == 'UKNWN') ? 'selected' : ''; ?>>Unknown</option>
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
        <button name ="submit" type="submit">Update Owner</button>
        <button onclick="window.location.href='owner.php'">Cancel</button>
    </form>
</body>
</html>
