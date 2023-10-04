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
$Ext_P_Fname = $_POST['Ext_P_Fname'];
$Ext_P_Lname = $_POST['Ext_P_Lname'];
$Ext_P_Age = $_POST['Ext_P_Age'];
$Ext_P_Group_number = $_POST['Ext_P_Group_number'];
$Ext_P_Teacher_Fname = $_POST['Ext_P_Teacher_Fname'];
$Ext_P_Teacher_Lname = $_POST['Ext_P_Teacher_Lname'];
$Ext_P_Level = $_POST['Ext_P_Level'];
$Ext_P_T_ID = $_POST['Ext_P_T_ID'];
echo $Ext_P_Level;

// Insert data into DB2
$sql = "INSERT INTO ext_person (Ext_P_Fname, Ext_P_Lname, Ext_P_Age, Ext_P_Group_number, Ext_P_Teacher_Fname, Ext_P_Teacher_Lname, Ext_P_Level, Ext_P_T_ID) VALUES 
                                ('$Ext_P_Fname', '$Ext_P_Lname', '$Ext_P_Age', '$Ext_P_Group_number', '$Ext_P_Teacher_Fname', '$Ext_P_Teacher_Lname', '$Ext_P_Level', '$Ext_P_T_ID')";

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
