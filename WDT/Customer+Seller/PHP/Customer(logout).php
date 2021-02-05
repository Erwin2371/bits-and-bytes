<?php
session_start();
session_destroy();

header('location:../HTML/Customer(Login - Sign Up).php');
?>