<?php 

if(isset($_GET["id"])){

    $id = $_GET["id"];
    $delete = "DELETE FROM `student` WHERE ID = '$id'";
    mysqli_query($connection,$delete);
    header("location: show.php");
}




?>