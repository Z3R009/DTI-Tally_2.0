<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in() {
    return isset($_SESSION['admin_id']);
}

function require_login() {
    if (!is_logged_in()) {
        // action scripts live one folder deeper (actions/), so fix the redirect path
        $prefix = (basename(dirname($_SERVER['SCRIPT_NAME'])) === 'actions') ? '../' : '';
        header("Location: " . $prefix . "login.php");
        exit;
    }
}
