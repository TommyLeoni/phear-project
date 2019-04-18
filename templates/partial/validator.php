<?php
if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: /user/login');
}
?>