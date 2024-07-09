<?php 

include 'database.php';

session_start();

if(isset($_SESSION['email'])) {
    $query = "SELECT * FROM users WHERE email = '{$_SESSION['email']}'";

    $result = mysqli_query($sql, $query);

    $data = mysqli_fetch_assoc($result);
    $fname = $data['fname'];
    $lname = $data['lname'];

    $userName = $fname.' '.$lname;
    $userImg = 'Asserts/Users_DB_Images/'.$data['img'];

    $menu = "<span>{$userName}</span>
                <ul>
                    <li><a href='dashboard.php'>Dashboard</a></li>
                    <li><a href='signout.php'>Sign out</a></li>
                </ul>";

}
else {
    $userName = $fname = 'User';
    $userImg = 'Asserts/app_images/noUser.png';
    $menu = "<ul>
                    <li><a href='login.php'>Sign In</a></li>
                </ul>";
}
?>