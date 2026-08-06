<?php
include 'config/database.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';
?>

<?php include 'includes/topnav.php'; ?>

<style>
    td:nth-child(1),
    th:nth-child(1) {
        display: none;
    }
</style>

<div class="container-fluid p-4">

    <div class="card">

        <div class="card-header bg-primary text-white">
            <h4>Teams</h4>
        </div>

        <div class="card-body">

            <?php if (!empty($_GET['logo_error'])) { ?>
                <div class="alert alert-warning"><?= htmlspecialchars($_GET['logo_error']) ?></div>
            <?php } ?>

            <form action="actions/add_team.php" method="POST" enctype="multipart/form-data">

                <div class="row g-2">

                    <div class="col-md-5">
                        <input
                            type="text"
                            name="team_name"
                            class="form-control"
                            placeholder="Enter Team Name"
                            required>
                    </div>

                    <div class="col-md-4">
                        <input
                            type="file"
                            name="team_logo"
                            class="form-control"
                            accept="image/*">
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary w-100">
                            Save Team
                        </button>
                    </div>

                </div>

            </form>

            <hr>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th width="8%">ID</th>

                        <th width="10%">Logo</th>

                        <th>Team Name</th>

                        <th width="20%">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $result = $conn->query("SELECT * FROM teams ORDER BY team_name");

                    while ($row = $result->fetch_assoc()) {

                    ?>

                        <tr>

                            <td><?= $row['id'] ?></td>

                            <td>
                                <?php if (!empty($row['logo']) && file_exists(__DIR__ . '/assets/images/team-logos/' . $row['logo'])) { ?>
                                    <img src="assets/images/team-logos/<?= htmlspecialchars($row['logo']) ?>" style="width:36px;height:36px;border-radius:50%;object-fit:cover;">
                                <?php } else { ?>
                                    <span class="text-muted small">None</span>
                                <?php } ?>
                            </td>

                            <td><?= $row['team_name'] ?></td>

                            <td>

                                <a href="edit_team.php?id=<?= $row['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <a href="actions/delete_team.php?id=<?= $row['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this team?')">
                                    <i class="bi bi-trash"></i> Delete
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>