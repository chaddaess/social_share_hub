<?php
session_start();

// Check if request is an AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Unset facebook user session variable
    unset($_SESSION['facebook_user']);
}
