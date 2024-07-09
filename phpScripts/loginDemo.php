<?php
    include "database.php";

    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $res = null;

    $qry = mysqli_query($sql, "SELECT img FROM users WHERE email = '{$email}'");
    if(mysqli_num_rows($qry) > 0){
        $img = mysqli_fetch_assoc($qry);
        $res = $img['img'];
    }
    else{
        $res = 'notFount';
    }
    echo $res;
?>