<?php
$user = 'root';
$password = '';
$database = 'web1db';
$host='localhost';
$conn = mysqli_connect($host, $user, $password, $database);

// Initialize filter variables
$yearFilter = '';

    // Check if age filter is provided in the URL
    if (isset($_GET['year']) && is_numeric($_GET['year'])) {
        $yearFilter = "T_Year = " . (int)$_GET['year'];
    }
    // Build the SQL query based on the filters
    $sql = "SELECT * FROM thesis";

// Build the SQL query based on the filters
$sql = "SELECT * FROM thesis";

// Add WHERE clause if filters are provided
if ($yearFilter !== '') {
    $sql .= " WHERE ";

    // Add age filter
    if ($yearFilter !== '') {
        $sql .= $yearFilter;
    }
}

$result = $conn->query($sql);

// Loop to display filtered data
while ($data = $result->fetch_assoc()):
?>
<tr>
    <td><?php echo $data['T_ID']; ?></td>
    <td><?php echo $data['T_Title']; ?></td>
    <td><?php echo $data['T_Abstract']; ?></td>
    <td><?php echo $data['T_Year']; ?></td>
</tr>
<?php endwhile; ?>
