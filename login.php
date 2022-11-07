<?php
$mail = $_POST['mail'];
$pass  = $_POST['pass'];
$con = new mysqli("localhost", "root", "", "guvi2_new");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from login where mail = ?");
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['pass'] === $pass){
            echo "<h2>Login successful</h2>";
        }
        else{
            echo "<h2>Invalid email or password</h2>";
        }
    }
    else{
        echo "<h2>Invalid email or password</h2>";
    }
}