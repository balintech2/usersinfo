<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

if (isset($_COOKIE['user'])) {
    $user_acount = $_COOKIE['user'];
    // echo "curPageName " . $curPageName;
    if ($curPageName == "Login.php") {
        header("Location: index.php");
        die();
    }
} else {
    if ($curPageName != "Login.php") {
        header("Location: Login.php");
        die();
    }
}
