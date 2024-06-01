<?php
    $server_name = "localhost";
    $username = "nwasike";
    $password = "getthisbread984";
    $database = "travel_agency";

    $con = mysqli_connect($server_name, $username, $password, $database);

    if (!$con){
        die("Could not connect".mysqli_connect_error());
    }
?>