<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();

$team = trim($_POST['team_name']);

$stmt = $conn->prepare("INSERT INTO teams(team_name) VALUES(?)");
$stmt->bind_param("s",$team);

$stmt->execute();

header("Location: ../teams.php");
exit;