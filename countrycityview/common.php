<?php
class Common
{
  public function getCountry($con)
  {
      $mainQuery = "SELECT * FROM country";
      $result1 = $con->query($mainQuery) or die("Error in main Query".$con->error);
      return $result1;
  }

  public function getCityByCountry($con,$country_id){
      $query = "SELECT * FROM city WHERE country_id='$country_id'";
      $result = $con->query($query) or die("Error in  Query".$con->error);
      return $result;
  }
}