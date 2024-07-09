<?php
    include "database.php";

    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['fname']) && isset($_POST['lname']) ){
        $email = mysqli_real_escape_string($sql, $_POST['email']);
        $password = md5($_POST['password']);
        $repassword =  md5($_POST['repassword']);
        $fname = mysqli_real_escape_string($sql, $_POST['fname']);
        $lname = mysqli_real_escape_string($sql, $_POST['lname']);
        $response = null;

        if($email != '' && $password != '' && $repassword != ''){

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $qry = mysqli_query($sql, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($qry) > 0){
                $response = "<div class='error con'>
                <span>Already User Found</span>
                <span class='canAlert'>&times;</span>
            </div>";
            }
            else{
                if($password == $repassword){
                    if($fname != '' && $fname != ''){
                        $exe = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        $requriers = ['png', 'jpeg', 'jpg'];
                        $des_name = $email.".".$exe;
                        // echo $des_name;
                        if(in_array($exe, $requriers)){
                            move_uploaded_file($_FILES['file']['tmp_name'], "../Asserts/Users_DB_Images/".$des_name);
                            $insert = mysqli_query($sql, "INSERT INTO users (fname, lname, email, password, img) VALUES ('{$fname}','{$lname}','{$email}','{$password}','{$des_name}');");
                            $response = "steptwoSuccess";
                        }
                        else{
                            $response = "<div class='error con'>
                                <span>Upload png, jpeg, jpg files</span>
                                <span class='canAlert'>&times;</span>
                                </div>";
                            }
                    }
                    else{
                        $response = 'steponeSuccess';
                    }
                }
                else{
                    $response = "<div class='error con'>
                            <span>password not matched</span>
                            <span class='canAlert'>&times;</span>
                        </div>";
                } 
            }     
            }
            else{
                $response = "<div class='error con'>
                    <span>Enter valid Email</span>
                    <span class='canAlert'>&times;</span>
                </div>";
            } 
        }
        else{
            $response = "<div class='error con'>
                    <span>Fill all Feilds</span>
                    <span class='canAlert'>&times;</span>
                </div>";
            }

        echo $response;
    }

?>