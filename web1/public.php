
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <link rel="stylesheet" href="public.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
 
<header>
    <div class="header-title">
        <h1>
            List of data
        </h1>
    </div>
</header>
<body>
    
    <section>
        <form class="form-search-box" action="">
            <div class="search-box">
                <div class="input-box">
                    <form class="form-search-person" action="" method="GET">
                        <div class="filter-person">
                            <input type="text" name="p_fname" id="p_fname" placeholder="Person's name">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <div class="mid-section">
            <form class="form-filter-box" action="">
                <div class="filter-box">
                    <div class="filter-element">
                        <form class="form-filter-person" action="" method="GET">
                            <div class="filter-person">
                                <label for="age">Age:</label>
                                <input type="number" name="age" id="age" placeholder="Enter Age">
                                <label for="level">Group:</label>
                                <input type="text" name="group" id="group" placeholder="Enter Group">
                                <label for="level">Level:</label>
                                <input type="text" name="level" id="level" placeholder="Enter Level">
                            </div>
                            <div class="filter-person">
                                <label for="year">Year:</label>
                                <input type="number" name="year" id="year" placeholder="Enter Year">
                                <button type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            <div class="table-box">
                <table class="person-table">
                    <tr>
                        <th>Person ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Age</th>
                        <th>Group</th>
                        <th>Teacher's first name</th>
                        <th>Teacher's last name</th>
                        <th>Level</th>
                        <th>Thesis ID</th>
                    </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                    <?php
                        $user = 'root';
                        $password = '';
                        $database = 'web1db';
                        $host='localhost';
                        $mysqli = new mysqli($host, $user,
                                        $password, $database);
                        
                        // Checking for connections
                        if ($mysqli->connect_error) {
                            die('Connect Error (' .
                            $mysqli->connect_errno . ') '.
                            $mysqli->connect_error);
                        }
                        
                        $fnameSearch = '';
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
                            $fnameSearch = mysqli_real_escape_string($mysqli, $_GET['p_fname']);
                    
                            // Modify the SQL query to include a search condition
                            $sql = "SELECT * FROM person WHERE P_Fname LIKE '$fnameSearch' OR P_Lname LIKE '$fnameSearch'";
                        }
                        // Add WHERE clause if filters are provided
                        elseif ($ageFilter !== '' || $levelFilter !== '' || $groupFilter !== '') {
                            $sql .= " WHERE ";

                            // Add age filter
                            if ($ageFilter !== '') {
                                $sql .= $ageFilter;
                            }
                    
                            // Add AND if both filters are present
                            if ($ageFilter !== '' && $levelFilter !== '') {
                                $sql .= " AND ";
                            }
                    
                            // Add level filter
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
                        }
                        echo $sql;
                        $result = $mysqli->query($sql);
                        $mysqli->close();
                            // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                        ?>
                        <tr>
                            <!-- FETCHING DATA FROM EACH
                                ROW OF EVERY COLUMN -->
                            <td><?php echo $rows['P_ID'];?></td>
                            <td><?php echo $rows['P_Fname'];?></td>
                            <td><?php echo $rows['P_Lname'];?></td>
                            <td><?php echo $rows['P_Age'];?></td>
                            <td><?php echo $rows['P_Group_number'];?></td>
                            <td><?php echo $rows['P_Teacher_Fname'];?></td>
                            <td><?php echo $rows['P_Teacher_Lname'];?></td>
                            <td><?php echo $rows['P_Level'];?></td>
                            <td><?php echo $rows['P_T_ID'];?></td>
                        </tr>
                    <?php
                        }
                        
                    ?>
                </table>
                <table class="person-table">
                    <tr>
                        <th>Thesis ID</th>
                        <th>Title</th>
                        <th>Abstract</th>
                        <th>Year</th>
                    </tr>
                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                    <?php
                        $user = 'root';
                        $password = '';
                        $database = 'web1db';
                        $host='localhost';
                        $mysqli = new mysqli($host, $user,
                                        $password, $database);
                        
                        // Checking for connections
                        if ($mysqli->connect_error) {
                            die('Connect Error (' .
                            $mysqli->connect_errno . ') '.
                            $mysqli->connect_error);
                        }
                        
                        $yearFilter = '';
                    
                        if (isset($_GET['year']) && is_numeric($_GET['year'])) {
                            $yearFilter = "T_year = " . (int)$_GET['year'];
                        }
                        $sql = "SELECT * FROM thesis";
                        if ($yearFilter !== '') {
                            $sql .= " WHERE ";
                            if ($yearFilter !== '') {
                                $sql .= $yearFilter;
                            }
                        }
                        echo $sql;
                        $result = $mysqli->query($sql);
                        $mysqli->close();
                        // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td><?php echo $rows['T_ID'];?></td>
                        <td><?php echo $rows['T_Title'];?></td>
                        <td><?php echo $rows['T_Abstract'];?></td>
                        <td><?php echo $rows['T_Year'];?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <footer>
    <div class="footer-title">
        <div class="footer">
            <h2>
                The end
            </h2>
        </div>
    </div>
</footer>          
    <script src="public.js"></script>
</body>
 
</html>