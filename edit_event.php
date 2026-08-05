<?php
include 'config/database.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM events WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$event = $stmt->get_result()->fetch_assoc();
?>

<?php include 'includes/topnav.php'; ?>

<div class="container-fluid p-4">

<div class="card">

<div class="card-header bg-warning text-dark">
<h4>Edit Event</h4>
</div>

<div class="card-body">

<form action="actions/update_event.php" method="POST">

<input type="hidden" name="id" value="<?= $event['id'] ?>">

<div class="mb-3">
<label>Event Name</label>
<input
type="text"
name="event_name"
class="form-control"
value="<?= htmlspecialchars($event['event_name']) ?>"
required>
</div>

<div class="mb-3">
<label>Category</label>

<select name="category" class="form-select">

<option value="Major" <?= $event['category']=="Major"?"selected":"" ?>>Major</option>

<option value="Minor" <?= $event['category']=="Minor"?"selected":"" ?>>Minor</option>

<option value="Special" <?= $event['category']=="Special"?"selected":"" ?>>Special</option>

</select>

</div>

<h5>Point System</h5>

<div class="row">

<div class="col">
<label>1st</label>
<input type="number" min="0" name="first_place" class="form-control" value="<?= $event['first_place'] ?>">
</div>

<div class="col">
<label>2nd</label>
<input type="number" min="0" name="second_place" class="form-control" value="<?= $event['second_place'] ?>">
</div>

<div class="col">
<label>3rd</label>
<input type="number" min="0" name="third_place" class="form-control" value="<?= $event['third_place'] ?>">
</div>

<div class="col">
<label>4th</label>
<input type="number" min="0" name="fourth_place" class="form-control" value="<?= $event['fourth_place'] ?>">
</div>

<div class="col">
<label>5th</label>
<input type="number" min="0" name="fifth_place" class="form-control" value="<?= $event['fifth_place'] ?>">
</div>

<div class="col">
<label>6th</label>
<input type="number" min="0" name="sixth_place" class="form-control" value="<?= $event['sixth_place'] ?>">
</div>

<div class="col">
<label>Non Winner</label>
<input type="number" min="0" name="non_winner" class="form-control" value="<?= $event['non_winner'] ?>">
</div>

</div>

<br>

<button class="btn btn-primary">Update Event</button>

<a href="events.php" class="btn btn-secondary">Cancel</a>

</form>

</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>