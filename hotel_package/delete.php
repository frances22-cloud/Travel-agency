<?php
$db = mysqli_connect("localhost","root","","travel agency database");

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM hotel WHERE `id`=$id";
    $result = mysqli_query($db,$sql);
    if($result){
        echo "Delete Successful";
        header('location:hotel_table.php');
    }
    else{
        die(mysqli_error($db));
    }
}

?>