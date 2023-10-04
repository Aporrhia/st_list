<?php

if (isset($_POST['transfer-form'])) {
    // Include the code for transferring data from DB2 to DB1
    include('updatePerson.php');
    include('updateThesis.php');
}

?>
