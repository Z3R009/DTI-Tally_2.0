<?php
include '../config/database.php';

if (!isset($_GET['event'])) {
    header("Location: ../scoresheet.php");
    exit;
}

$eventID = intval($_GET['event']);

$stmt = $conn->prepare("DELETE FROM scores WHERE event_id = ?");
$stmt->bind_param("i", $eventID);
$stmt->execute();

$stmt->close();

header("Location: ../scoresheet.php?event=" . $eventID . "&cleared=1");
exit;
