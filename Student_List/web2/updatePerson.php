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
$sql2 = "SELECT * FROM ext_person";
$result2 = mysqli_query($conn2, $sql2);

// Loop through the data from DB2
while ($row2 = mysqli_fetch_assoc($result2)) {
    $Ext_P_ID = $row2['Ext_P_ID'];

    // Check if the ID exists in DB1
    $sql1 = "SELECT * FROM person WHERE P_ID = '$Ext_P_ID'";
    $result1 = mysqli_query($conn1, $sql1);

    // If the ID doesn't exist in DB1, insert the data
    if (mysqli_num_rows($result1) === 0) {
        $Ext_P_Fname = mysqli_real_escape_string($conn1, $row2['Ext_P_Fname']);
        $Ext_P_Lname = mysqli_real_escape_string($conn1, $row2['Ext_P_Lname']);
        $Ext_P_Age = $row2['Ext_P_Age'];
        $Ext_P_Group_number = mysqli_real_escape_string($conn1, $row2['Ext_P_Group_number']);
        $Ext_P_Teacher_Fname = mysqli_real_escape_string($conn1, $row2['Ext_P_Teacher_Fname']);
        $Ext_P_Teacher_Lname = mysqli_real_escape_string($conn1, $row2['Ext_P_Teacher_Lname']);
        $Ext_P_Level = mysqli_real_escape_string($conn1, $row2['Ext_P_Level']);
        $Ext_P_T_ID = $row2['Ext_P_T_ID'];
        // Insert data into DB2
        $insertSql = "INSERT INTO person (P_Fname, P_Lname, P_Age, P_Group_number, P_Teacher_Fname, P_Teacher_Lname, P_Level, P_T_ID) VALUES 
                                        ('$Ext_P_Fname', '$Ext_P_Lname', '$Ext_P_Age', '$Ext_P_Group_number', '$Ext_P_Teacher_Fname', '$Ext_P_Teacher_Lname', '$Ext_P_Level', '$Ext_P_T_ID')";
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
