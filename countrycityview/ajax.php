<?php
include "dbconnection.php";
include_once "Common.php";
if (isset($_POST['getCityByCountry']) == "getCityByCountry") {
    $country_id = $_POST['country_id'];
    $common = new Common();
    $cities = $common->getCityByCountry($con,$country_id);
    $cityData = '<option value="">City</option>';
    if ($cities->num_rows>0){
        while ($city = $cities->fetch_object()) {
            $cityData .= '<option value="'.$city->id.'">'.$city->city_name.'</option>';
        }
    }
    echo "test^".$cityData;
}