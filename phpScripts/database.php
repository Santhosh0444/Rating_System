<?php
    $sql = mysqli_connect('localhost', 'root', '', 'ratingSystem');
    if(!$sql){
        $response = "<div class='error con'>
                <span>Database Error</span>
                <span class='canAlert'>&times;</span>
            </div>";
        $response = "<div class='error con'>
            <span>Try Again Later</span>
            <span class='canAlert'>&times;</span>
        </div>";
    }
?>