<?php

if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
    // return true;
    sleep(2);
    header("Location: Login.php");
} else {
    return false;
}

