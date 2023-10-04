<?php
// Establish connections to DB1 and DB2
$host1 = 'localhost';
$user1 = 'root';
$password1 = '';
$database1 = 'web1db';

$host2 = 'localhost';
$user2 = 'root';
$password2 = '';
$database2 = 'web2db';

$conn1 = mysqli_connect($host1, $user1, $password1, $database1);
$conn2 = mysqli_connect($host2, $user2, $password2, $database2);

if (!$conn1 || !$conn2) {
    die('Connection Error: ' . mysqli_connect_error());
}

// Retrieve data from DB2
$sql2 = "SELECT * FROM ext_thesis";
$result2 = mysqli_query($conn2, $sql2);

// Loop through the data from DB2
while ($row2 = mysqli_fetch_assoc($result2)) {
    $Ext_T_ID = $row2['Ext_T_ID'];

    // Check if the ID exists in DB1
    $sql1 = "SELECT * FROM thesis WHERE T_ID = '$Ext_T_ID'";
    $result1 = mysqli_query($conn1, $sql1);

    // If the ID doesn't exist in DB1, insert the data
    if (mysqli_num_rows($result1) === 0) {
        $Ext_T_Title = mysqli_real_escape_string($conn1, $row2['Ext_T_Title']);
        $Ext_T_Abstract = mysqli_real_escape_string($conn1, $row2['Ext_T_Abstract']);
        $Ext_T_Year = $row2['Ext_T_Year'];

        // Insert data into DB1
        $insertSql = "INSERT INTO thesis (T_Title, T_Abstract, T_Year) VALUES ('$Ext_T_Title', '$Ext_T_Abstract', '$Ext_T_Year')";
        mysqli_query($conn1, $insertSql);
    }
}

// Close the connections
mysqli_close($conn1);
mysqli_close($conn2);

// Provide a response to indicate success or failure
$response = ['success' => true];
header('Content-Type: application/json');
echo json_encode($response);
?>
