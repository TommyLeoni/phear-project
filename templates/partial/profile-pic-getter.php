<?php
$default = "https://de.gravatar.com/userimage/";
$size = 50;
$grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($_SESSION['email']))) . "?d=" . urlencode($default) . "&s=" . $size;

if (!@GetImageSize($grav_url)) {
    $grav_url = "https://en.gravatar.com/userimage/155142028/3feda8a9ec892e6fd113d870ffe6184e.jpeg";
}
?>