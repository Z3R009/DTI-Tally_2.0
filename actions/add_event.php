<?php

include '../config/database.php';
include '../includes/auth.php';
require_login();

$first  = ($_POST['first_place']  !== '') ? intval($_POST['first_place'])  : 0;
$second = ($_POST['second_place'] !== '') ? intval($_POST['second_place']) : 0;
$third  = ($_POST['third_place']  !== '') ? intval($_POST['third_place'])  : 0;
$fourth = ($_POST['fourth_place'] !== '') ? intval($_POST['fourth_place']) : 0;
$fifth  = ($_POST['fifth_place']  !== '') ? intval($_POST['fifth_place'])  : 0;
$sixth  = ($_POST['sixth_place']  !== '') ? intval($_POST['sixth_place'])  : 0;
$nonwin = ($_POST['non_winner']   !== '') ? intval($_POST['non_winner'])   : 0;

$stmt = $conn->prepare("
INSERT INTO events
(
event_name,
category,
first_place,
second_place,
third_place,
fourth_place,
fifth_place,
sixth_place,
non_winner
)

VALUES(?,?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
"ssiiiiiii",

$_POST['event_name'],
$_POST['category'],
$first,
$second,
$third,
$fourth,
$fifth,
$sixth,
$nonwin
);

$stmt->execute();

header("Location: ../events.php");