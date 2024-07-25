<?php

$con = mysqli_connect("localhost", "root", "@Santamena1", "library_management");

if (!$con) {
    die('connection failed' . mysqli_connect_error());
}
