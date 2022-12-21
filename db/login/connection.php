<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPwd = ''; // a1YZOIWf5wOB
    $dbName = 'anthelion';

    $con = mysqli_connect($dbHost, $dbUser, $dbPwd, $dbName);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>