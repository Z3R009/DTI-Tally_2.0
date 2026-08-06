<?php

// Handles a team-logo upload from $_FILES['team_logo'].
// Returns ['filename' => string|null, 'error' => string|null].
// filename is null when no file was submitted (not an error) or when validation failed.
function handle_team_logo_upload()
{

    if (!isset($_FILES['team_logo']) || $_FILES['team_logo']['error'] === UPLOAD_ERR_NO_FILE) {
        return ['filename' => null, 'error' => null];
    }

    if ($_FILES['team_logo']['error'] !== UPLOAD_ERR_OK) {
        return ['filename' => null, 'error' => 'Logo upload failed. Please try again.'];
    }

    $maxBytes = 2 * 1024 * 1024;
    if ($_FILES['team_logo']['size'] > $maxBytes) {
        return ['filename' => null, 'error' => 'Logo must be 2MB or smaller.'];
    }

    $imageInfo = @getimagesize($_FILES['team_logo']['tmp_name']);
    if ($imageInfo === false) {
        return ['filename' => null, 'error' => 'That file is not a valid image.'];
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
    ];

    $mime = $imageInfo['mime'];

    if (!isset($allowed[$mime])) {
        return ['filename' => null, 'error' => 'Logo must be a JPG, PNG, GIF, or WEBP image.'];
    }

    $ext = $allowed[$mime];
    $filename = 'team_' . bin2hex(random_bytes(8)) . '.' . $ext;
    $destination = __DIR__ . '/../assets/images/team-logos/' . $filename;

    if (!move_uploaded_file($_FILES['team_logo']['tmp_name'], $destination)) {
        return ['filename' => null, 'error' => 'Could not save the uploaded logo.'];
    }

    return ['filename' => $filename, 'error' => null];
}

// Deletes a previously-uploaded logo file, if it exists.
function delete_team_logo_file($filename)
{
    if (!$filename) {
        return;
    }
    $path = __DIR__ . '/../assets/images/team-logos/' . $filename;
    if (file_exists($path)) {
        @unlink($path);
    }
}
