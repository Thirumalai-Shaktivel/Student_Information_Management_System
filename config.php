<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'student details(mini project)');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
    ?>
    <script>
        alert('Error: No Response From Database Side!!');
    </script>
    <?php
}

?>