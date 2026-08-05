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

<form action="actions/update_team.php" method="POST">

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

<button class="btn btn-primary">
Update
</button>

<a
href="teams.php"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>
