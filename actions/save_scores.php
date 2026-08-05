<?php
include '../config/database.php';
include '../includes/auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: ../scoresheet.php");
    exit;
}

$event_id   = intval($_POST['event_id']);
$team_ids   = $_POST['team_id'];
$placements = $_POST['placement'];
$points     = $_POST['points'];

// Prepared statement - current scores (overwrites on re-save)
$stmt = $conn->prepare("
INSERT INTO scores (event_id, team_id, placement, points)
VALUES (?, ?, ?, ?)
ON DUPLICATE KEY UPDATE
placement = VALUES(placement),
points = VALUES(points)
");

// Prepared statement - permanent log, one new row per save, never overwritten
$logStmt = $conn->prepare("
INSERT INTO score_history (event_id, team_id, placement, points)
VALUES (?, ?, ?, ?)
");

for ($i = 0; $i < count($team_ids); $i++) {

    // Skip teams without placement
    if (empty($placements[$i])) {
        continue;
    }

    $team_id   = intval($team_ids[$i]);
    $placement = intval($placements[$i]);
    $point     = intval($points[$i]);

    $stmt->bind_param(
        "iiii",
        $event_id,
        $team_id,
        $placement,
        $point
    );

    $stmt->execute();

    $logStmt->bind_param(
        "iiii",
        $event_id,
        $team_id,
        $placement,
        $point
    );

    $logStmt->execute();
}

$stmt->close();
$logStmt->close();
$conn->close();

header("Location: ../scoresheet.php?event=".$event_id."&saved=1");
exit;