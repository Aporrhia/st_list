<?php
$user = 'root';
$password = '';
$database = 'web1db';
$host='localhost';
$conn = mysqli_connect($host, $user, $password, $database);

// Initialize variables
$nameSearch = '';
$ageFilter = '';
$levelFilter = '';
$groupFilter = '';

    // Check if age filter is provided in the URL
    if (isset($_GET['age']) && is_numeric($_GET['age'])) {
        $ageFilter = "P_Age = " . (int)$_GET['age'];
    }

    // Check if level filter is provided in the URL
    if (isset($_GET['group']) && !empty($_GET['group'])) {
        // Add the level filter to the SQL query
        $groupFilter = "P_Group_number = '" . $_GET['group'] . "'";
    }

    // Check if level filter is provided in the URL
    if (isset($_GET['level']) && !empty($_GET['level'])) {
        // Add the level filter to the SQL query
        $levelFilter = "P_Level = '" . $_GET['level'] . "'";
    }

    // Build the SQL query based on the filters
    $sql = "SELECT * FROM person";


    if (isset($_GET['p_fname']) && !empty($_GET['p_fname'])) {
        // Sanitize the search query to prevent SQL injection
        $nameSearch = mysqli_real_escape_string($mysqli, $_GET['p_fname']);

        // Modify the SQL query to include a search condition
        $sql = "SELECT * FROM person WHERE P_Fname LIKE '$nameSearch' OR P_Lname LIKE '$nameSearch'";
    }

    if (isset($_GET['name']) && !empty($_GET['name'])) {
        // Sanitize the name search query to prevent SQL injection
        $nameSearch = mysqli_real_escape_string($conn, $_GET['name']);
        $nameSearch = "P_Fname LIKE '%$nameSearch%' OR P_Lname LIKE '%$nameSearch%'";
    }
// Build the SQL query based on the filters
$sql = "SELECT * FROM person";



// Add WHERE clause if filters are provided
if ($nameSearch !== '' || $ageFilter !== '' || $levelFilter !== '' || $groupFilter !== '') {
    $sql .= " WHERE ";

    if ($ageFilter !== '') {
        $sql .= $ageFilter;
    }

    if ($ageFilter !== '' && $levelFilter !== '') {
        $sql .= " AND ";
    }

    if ($levelFilter !== '') {
        $sql .= $levelFilter;
    }

    if ($ageFilter !== '' && $groupFilter !== '') {
        $sql .= " AND ";
    }
    if ($groupFilter !== '' && $levelFilter !== '') {
        $sql .= " AND ";
    }
    if ($ageFilter !== '' && $levelFilter !== '' && $groupFilter !== '') {
        $sql .= " AND ";
    }
    if ($groupFilter !== '') {
        $sql .= $groupFilter;
    }
    if ($nameSearch !== '') {
        $sql .= $nameSearch;
    }
}
$result = $conn->query($sql);

// Loop to display filtered data
while ($data = $result->fetch_assoc()):
?>
<tr>
    <td><?php echo $data['P_ID']; ?></td>
    <td><?php echo $data['P_Fname']; ?></td>
    <td><?php echo $data['P_Lname']; ?></td>
    <td><?php echo $data['P_Age']; ?></td>
    <td><?php echo $data['P_Group_number']; ?></td>
    <td><?php echo $data['P_Teacher_Fname']; ?></td>
    <td><?php echo $data['P_Teacher_Lname']; ?></td>
    <td><?php echo $data['P_Level']; ?></td>
    <td><?php echo $data['P_T_ID']; ?></td>
</tr>
<?php endwhile; ?>

