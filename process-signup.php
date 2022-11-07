<?php

$fname = $_POST['fname'];
$lname  = $_POST['lname'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$idnumber=$_POST['idnumber'];



if (!empty($fname) || !empty($lname) || !empty($mail) || !empty($pass)|| !empty($idnumber) )
{

$host = "localhost";
$dbusername = "root";
$dblnameword = "";
$dbname = "guvi2_new";




// Create connection
$conn = new mysqli ($host, $dbusername, $dblnameword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT lname From login Where lname = ? Limit 1";
  $INSERT = "INSERT Into login (fname , lname ,mail, pass,idnumber )values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $lname);
     $stmt->execute();
     $stmt->bind_result($lname);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssi", $fname,$lname,$mail,$pass,$idnumber);
      $stmt->execute();
      echo "sucessfully signed up";
     } else {
      echo "Account already exist";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>