<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $city = $_POST['city_id'];

    echo 'Country is: '. $country;  '<br/>';
    echo 'City is   : '. $city; echo '<br/>';
}