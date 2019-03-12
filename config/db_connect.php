<?php
    //connect to MySQL
    $conn = mysqli_connect('localhost', 'mickey', 'test1234', 'unoodle');

    //check connection
    if(!$conn) {
        echo 'Connection errors: '. mysqli_connect_error();
    }
?>