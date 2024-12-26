<?php
require "connection.php";

if(isset($_POST["btn"])){
    $name  = $_POST["name"];
    $email = $_POST["email"];
    $pass  = $_POST["password"];

    $checkemail = "SELECT * FROM `user` WHERE `Email` = '$email'";
    $result = mysqli_query($connection,$checkemail);
    if(mysqli_num_rows($result)> 0){

        header("location: signup.php?message=This emial is already registered");

    }else{

   $data = "INSERT INTO `user`(`Name`, `Email`, `Password`) VALUES ('$name','$email','$pass')";
   mysqli_query($connection,$data);
   header("location: ../index.php");

}};

session_start();
if(isset($_POST["login_btn"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $select = "SELECT * FROM `user` WHERE `Email` = '$email' AND `Password` = '$password'";
    $data = mysqli_query($connection,$select);

    if(mysqli_num_rows($data)> 0){
        $_SESSION["Email"] = $email;
        header("location: dashboard.php");
    }else{
        header("location: ../index.php?Error=Your Password or Email is incorrect");
    }
    
}

if(isset($_POST["insert_data"])){
    $name = $_POST["name"];
    $email = $_POST["email"];

    $insert = "INSERT INTO `student`(`Name`, `Email`) VALUES ('$name','$email')";
    mysqli_query($connection,$insert);
    header("location: dashboard.php?success=successfully inserted");
}

if(isset($_POST["update_data"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $update = "UPDATE `student` SET `Name`='$name',`Email`='$email' Where ID ='$id' ";
    mysqli_query($connection,$update);
    header("location: show.php?success=successfully update");
}


if(isset($_GET["id"])){

    $id = $_GET["id"];
    $delete = "DELETE FROM `student` WHERE ID = '$id'";
    mysqli_query($connection,$delete);
    header("location: show.php?delete=successfully deleted");
}





?>