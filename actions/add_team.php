<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();
include '../includes/upload_logo.php';

$team = trim($_POST['team_name']);

$upload = handle_team_logo_upload();
$logo = $upload['filename'];

$stmt = $conn->prepare("INSERT INTO teams(team_name, logo) VALUES(?, ?)");
$stmt->bind_param("ss", $team, $logo);

$stmt->execute();

$redirect = "../teams.php";
if ($upload['error']) {
    $redirect .= "?logo_error=" . urlencode($upload['error']);
}

header("Location: " . $redirect);
exit;
