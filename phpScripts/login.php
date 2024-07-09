<?php

include "database.php";
session_start();

$response = null;

$email = mysqli_real_escape_string($sql, $_POST['email']);
$password = md5($_POST['password']);

if($email != '' && $password != ""){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
        $qry = mysqli_query($sql, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        
        if(mysqli_num_rows($qry) > 0){
            $_SESSION['email'] = $email;
            $response = "success";

        }
        else{
            $response = "<div class='error con'>
            <span>incorrect email or password</span>
            <span class='canAlert'>&times;</span>
            </div>";
        }
    }
    else{
        $response = "<div class='error con'>
            <span>Enter Valid Email</span>
            <span class='canAlert'>&times;</span>
        </div>";
    }
}
else{
    $response = "<div class='error con'>
        <span>Fill all box</span>
        <span class='canAlert'>&times;</span>
    </div>";
}

echo $response;

?>