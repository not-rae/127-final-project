

<?php

include 'DBConnector.php';

$delVehicle = intval($_POST['plateNumber']); 


$sqldel1 = $conn->prepare("DELETE FROM Vehicle WHERE plateNumber = ?");
$sqldel1->bind_param("i", $delVehicle);

if ($sqldel1->execute()) {
    echo "Items deleted from the database.";
    header('Location: vehicle.php');
} else {
    echo "Error deleting values";
}

$sqldel1->close();
$conn->close();

?>