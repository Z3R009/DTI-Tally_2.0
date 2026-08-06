<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();
include '../includes/upload_logo.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT logo FROM teams WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$team = $stmt->get_result()->fetch_assoc();

if ($team) {
    delete_team_logo_file($team['logo']);
}

$stmt = $conn->prepare("DELETE FROM teams WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../teams.php");
exit;
