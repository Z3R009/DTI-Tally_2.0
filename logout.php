<?php
include 'includes/auth.php';

session_unset();
session_destroy();

header("Location: overall.php");
exit;
