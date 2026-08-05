<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();

$id = intval($_GET['id']);

$conn->query("DELETE FROM teams WHERE id=$id");

header("Location: ../teams.php");
exit;