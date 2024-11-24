<?php
define('CONTEXT', 'other');

require "../backend/config.php";
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
?>