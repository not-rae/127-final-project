<!-- 
    This is responsible for showing the values from the history table

-->

<!DOCTYPE html>
<html>
<head>
    <title>DriVerify: History Records</title>
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
        h1 {
            font-size: 45px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #ff7d00;
        }
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .button-container button {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <h1>Violation Records</h1>
    <table>
        <tr>
            <th>Violation ID</th>
            <th>Violation Name</th>

        </tr>
        <?php
        include 'DBConnector.php';

            $sqlViolation ="SELECT * FROM violation";
            $resultViolation = $conn->query($sqlViolation);

            if($resultViolation->num_rows > 0){
                 while($rowtViolation = $resultViolation->fetch_assoc()) {
                    echo 
                        "<tr>". 
                        "<td align = 'center' >".$rowtViolation["violationID"]."</td>". 
                        "<td align = 'center' >".$rowtViolation["violationName"]."</td>". 

 
                        "</td>" .
                        "</tr>";       
                }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Back to Menu</button>
    </div>
</body>
</html>