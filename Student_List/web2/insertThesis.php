<?php
// Establish a connection to DB2
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'web2db';

$conn2 = mysqli_connect($host, $user, $password, $database);

if (!$conn2) {
    die('DB2 Connection Error: ' . mysqli_connect_error());
}


// Collect data from the AJAX request
$Ext_T_Title = $_POST['Ext_T_Title'];
$Ext_T_Abstract = $_POST['Ext_T_Abstract'];
$Ext_T_Year = $_POST['Ext_T_Year'];

// Insert data into DB2
$sql = "INSERT INTO ext_thesis (Ext_T_Title, Ext_T_Abstract, Ext_T_Year) VALUES ('$Ext_T_Title', '$Ext_T_Abstract', '$Ext_T_Year')";

if (mysqli_query($conn2, $sql)) {
    $response = ['success' => true];
} else {
    $response = ['success' => false];
}

// Send a JSON response back to the AJAX request
header('Content-Type: application/json');
echo json_encode($response);

// Close the DB2 connection
mysqli_close($conn2);

// Log the request and response to a file for debugging
$logData = date('Y-m-d H:i:s') . " - Request: " . json_encode($_POST) . " - Response: " . json_encode($response) . PHP_EOL;
file_put_contents('insert_log.txt', $logData, FILE_APPEND);
?>
