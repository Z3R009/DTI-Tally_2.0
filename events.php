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
<h4>Competition / Events</h4>
</div>

<div class="card-body">

<form action="actions/add_event.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Event Name</label>
<input type="text" name="event_name" class="form-control" required>
</div>

<div class="col-md-3 mb-3">
<label>Category</label>

<select name="category" class="form-control">

<option>Major</option>

<option>Minor</option>

<option>Special</option>

</select>

</div>

</div>

<hr>

<h5>Point System</h5>
<p class="text-muted small mb-2">Points awarded for each placement in this event.</p>

<div class="row">

<div class="col"><label class="form-label small">1st Place</label><input type="number" min="0" class="form-control" name="first_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">2nd Place</label><input type="number" min="0" class="form-control" name="second_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">3rd Place</label><input type="number" min="0" class="form-control" name="third_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">4th Place</label><input type="number" min="0" class="form-control" name="fourth_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">5th Place</label><input type="number" min="0" class="form-control" name="fifth_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">6th Place</label><input type="number" min="0" class="form-control" name="sixth_place" placeholder="Points" value="0"></div>

<div class="col"><label class="form-label small">Non Winner</label><input type="number" min="0" class="form-control" name="non_winner" placeholder="Points" value="0"></div>

</div>

<br>

<button class="btn btn-primary">
Save Event
</button>

</form>

<hr>

<table class="table table-bordered">

<thead>

<tr>

<th>Event</th>

<th>Category</th>

<th>1st</th>

<th>2nd</th>

<th>3rd</th>

<th>4th</th>

<th>5th</th>

<th>6th</th>

<th>NW</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

$result = $conn->query("SELECT * FROM events ORDER BY event_name");

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?= $row['event_name'] ?></td>

<td><?= $row['category'] ?></td>

<td><?= $row['first_place'] ?></td>

<td><?= $row['second_place'] ?></td>

<td><?= $row['third_place'] ?></td>

<td><?= $row['fourth_place'] ?></td>

<td><?= $row['fifth_place'] ?></td>

<td><?= $row['sixth_place'] ?></td>

<td><?= $row['non_winner'] ?></td>

<td>

<a href="edit_event.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
    <i class="bi bi-pencil-square"></i> Edit
</a>

<a href="actions/delete_event.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this event?')">
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