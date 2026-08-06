<?php
include 'config/database.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';

$id = intval($_GET['id']);

$row = $conn->query("SELECT * FROM teams WHERE id=$id")->fetch_assoc();
?>

<?php include 'includes/topnav.php'; ?>

<div class="container-fluid p-4">

    <div class="card">

        <div class="card-header bg-warning">

            <h4>Edit Team</h4>

        </div>

        <div class="card-body">

            <form action="actions/update_team.php" method="POST" enctype="multipart/form-data">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $row['id'] ?>">

                <label>Team Name</label>

                <input
                    type="text"
                    name="team_name"
                    class="form-control"
                    value="<?= htmlspecialchars($row['team_name']) ?>"
                    required>

                <br>

                <label>Team Logo</label><br>

                <?php if (!empty($row['logo']) && file_exists(__DIR__ . '/assets/images/team-logos/' . $row['logo'])) { ?>

                    <img
                        src="assets/images/team-logos/<?= htmlspecialchars($row['logo']) ?>"
                        style="width:64px;height:64px;border-radius:50%;object-fit:cover;border:1px solid #ddd;"
                        class="mb-2">

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="remove_logo" id="remove_logo" value="1">
                        <label class="form-check-label" for="remove_logo">Remove current logo</label>
                    </div>

                <?php } ?>

                <input
                    type="file"
                    name="team_logo"
                    class="form-control"
                    accept="image/*">

                <small class="text-muted">Upload a new image to replace the current logo. JPG, PNG, GIF, or WEBP, up to 2MB.</small>

                <br><br>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Update
                </button>

                <a href="teams.php" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cancel
                </a>

            </form>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>