<?php

session_start();

unset($_SESSION['email']);

session_destroy();

session_abort();

header('location: index.php');

?>