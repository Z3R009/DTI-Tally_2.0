<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();

$id = intval($_GET['id']);

$conn->query("DELETE FROM events WHERE id=$id");

header("Location: ../events.php");