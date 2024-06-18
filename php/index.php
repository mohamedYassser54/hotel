<?php
require 'connect.php';
require '../html/loading.html';
if(isset($_POST["submit"])){
    $name =$_POST["name"];
    $email =$_POST["email"];
    $age =$_POST["age"];
    $country =$_POST["country"];
    $gender=$_POST["gender"];
    $password =$_POST["password"];
    
    $languages = $_POST["lang"];
$language = implode(",", $languages);

    $checkuser = "SELECT * FROM `login` WHERE email = '$email'";
    $result1 = mysqli_query($conn , $checkuser);
    $count = mysqli_num_rows($result1);
    if($count>0){
        echo
        "<script>alert('email already exists')</script>";
        echo "<script>window.location.href='../index.html';</script>";
    }
    else if (strpos($email, '.com') === false) {
        echo "<script>alert('Invalid email')</script>";
        echo "<script>window.location.href='../index.html';</script>";
    }
    else{
        $result = mysqli_query($conn,"INSERT INTO `login` VALUES ('', '$name','$email','$password','$gender','$age','$language', '$country')");
        if($result){
            echo
            "<script>alert('Data Insertd  Successfully')</script>";
            echo 
            "<script>window.location.href='../html/hotel.html';</script>";
        }
    }
    
}
?>
