<?php
 require 'connect.php';
 require '../html/loading.html';
 if(isset($_POST["submit"])){
   $name = $_POST["name"];
   $cardnumber = $_POST["cardnumber"];
   $cvv = $_POST["cvv"];
   $date = $_POST["date"];

   $result= mysqli_query($conn,"SELECT * FROM `card2` WHERE cvv = '$cvv' AND name = '$name' AND date = '$date'");

   $row = mysqli_fetch_assoc($result);

   if(mysqli_num_rows($result)){
       if($cardnumber == $row["cardnumber"]){
           $_SESSION["cvv"] = true;
           $_SESSION["id"] = $row["id"];

           echo
           "<script> alert('The purchase was successful')</script>";
            echo
           "<script>window.location.href='../html/hotel.html'</script>";
           exit();
        }
        else if ($cardnumber != $row["cardnumber"]){
            echo
            "<script> alert('Invalid card')</script>";
            echo
            "<script>window.location.href='../html/card.html'</script>";
    
        }
   }
   else{
        echo
        "<script> alert('Invalid card')</script>";
        echo
        "<script>window.location.href='../html/card.html'</script>";
   }

 }

 ?>