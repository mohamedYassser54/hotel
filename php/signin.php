<?php
require 'connect.php';
require '../html/loading.html';
if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM `login` WHERE email = '$email'");

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)){
        if($password == $row['password']){
            $_SESSION["id"] = $row["id"];
            $_SESSION["login"] = true;

            echo
            "<script>alert('Data is Correct')</script>";
            echo
            "<script>window.location.href='../html/hotel.html'</script>";
        }
        else{
            echo
            "<script>alert('Wrong  Password')</script>";
            echo
            "<script>window.location.href='../html/signin.html'</script>";
        }
        
    }
    else{
        echo
        "<script>alert('User Not Registered')</script>";
        echo
        "<script>window.location.href='../html/signin.html'</script>";
    }
}

?>