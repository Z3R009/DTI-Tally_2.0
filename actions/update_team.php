<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();

$id = intval($_POST['id']);
$name = trim($_POST['team_name']);

$stmt = $conn->prepare("UPDATE teams SET team_name=? WHERE id=?");
$stmt->bind_param("si",$name,$id);

$stmt->execute();

header("Location: ../teams.php");
exit;