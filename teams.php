<?php
include 'config/database.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';
?>

<?php include 'includes/topnav.php'; ?>

<div class="container-fluid p-4">

<div class="card">

<div class="card-header bg-primary text-white">
<h4>Teams</h4>
</div>

<div class="card-body">

<form action="actions/add_team.php" method="POST">

<div class="row">

<div class="col-md-8">
<input
type="text"
name="team_name"
class="form-control"
placeholder="Enter Team Name"
required>
</div>

<div class="col-md-4">
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

<th width="10%">ID</th>

<th>Team Name</th>

<th width="20%">Action</th>

</tr>

</thead>

<tbody>

<?php

$result = $conn->query("SELECT * FROM teams ORDER BY team_name");

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['team_name'] ?></td>

<td>

<a
href="edit_team.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="actions/delete_team.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this team?')">

Delete

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