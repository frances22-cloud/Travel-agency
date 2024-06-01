<?php
$con = new mysqli("localhost","root","","travel_agency");
if (! $con){
    die("Error in connection".$con->connect_error);
}