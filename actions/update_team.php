
<?php



include '../config/database.php';
include '../includes/auth.php';
require_login();
include '../includes/upload_logo.php';

$id   = intval($_POST['id']);
$name = trim($_POST['team_name']);

$upload = handle_team_logo_upload();

// Look up the current logo in case we need to replace or remove it
$stmt = $conn->prepare("SELECT logo FROM teams WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$current = $stmt->get_result()->fetch_assoc();

if ($upload['filename']) {

    // A new logo was uploaded - swap it in and delete the old file
    delete_team_logo_file($current['logo'] ?? null);

    $stmt = $conn->prepare("UPDATE teams SET team_name=?, logo=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $upload['filename'], $id);
} elseif (isset($_POST['remove_logo'])) {

    // No new file, but the admin asked to remove the existing logo
    delete_team_logo_file($current['logo'] ?? null);

    $stmt = $conn->prepare("UPDATE teams SET team_name=?, logo=NULL WHERE id=?");
    $stmt->bind_param("si", $name, $id);
} else {

    // Just the name changed, leave the logo as-is
    $stmt = $conn->prepare("UPDATE teams SET team_name=? WHERE id=?");
    $stmt->bind_param("si", $name, $id);
}

$stmt->execute();

$redirect = "../teams.php";
if ($upload['error']) {
    $redirect .= "?logo_error=" . urlencode($upload['error']);
}

header("Location: " . $redirect);
exit;
