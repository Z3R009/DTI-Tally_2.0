<?php
include 'config/database.php';
include 'includes/auth.php';
require_login();
include 'includes/header.php';

function placement_label($p){
    switch((int)$p){
        case 1:  return "1st";
        case 2:  return "2nd";
        case 3:  return "3rd";
        case 4:  return "4th";
        case 5:  return "5th";
        case 6:  return "6th";
        case 99: return "Non Winner";
        default: return $p;
    }
}
?>

<?php include 'includes/topnav.php'; ?>

<div class="container-fluid p-4">

<div class="card">

<div class="card-header bg-primary text-white">
<h4>History</h4>
</div>

<div class="card-body">

<form method="GET">
<div class="row">
<div class="col-md-6">
<label>Filter by Competition/Event</label>
<select name="event" class="form-select" onchange="this.form.submit()">
<option value="">-- All Events --</option>
<?php
$events = $conn->query("SELECT * FROM events ORDER BY event_name");
while($e = $events->fetch_assoc()){
    $selected = (isset($_GET['event']) && $_GET['event'] == $e['id']) ? "selected" : "";
    echo "<option value='{$e['id']}' $selected>{$e['event_name']}</option>";
}
?>
</select>
</div>
</div>
</form>

<hr>

<?php
$eventFilter = (isset($_GET['event']) && $_GET['event'] !== '') ? intval($_GET['event']) : null;

$sql = "
SELECT sh.recorded_at, e.event_name, t.team_name, sh.placement, sh.points
FROM score_history sh
JOIN events e ON e.id = sh.event_id
JOIN teams t ON t.id = sh.team_id
";

if ($eventFilter) {
    $sql .= " WHERE sh.event_id = " . $eventFilter;
}

$sql .= " ORDER BY sh.recorded_at DESC, sh.id DESC LIMIT 200";

$result = $conn->query($sql);
?>

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>Date/Time</th>
<th>Event</th>
<th>Team</th>
<th>Placement</th>
<th>Points</th>
</tr>
</thead>

<tbody>

<?php if ($result && $result->num_rows > 0) { ?>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= htmlspecialchars($row['recorded_at']) ?></td>
<td><?= htmlspecialchars($row['event_name']) ?></td>
<td><?= htmlspecialchars($row['team_name']) ?></td>
<td><?= placement_label($row['placement']) ?></td>
<td><?= $row['points'] ?></td>
</tr>
<?php } ?>

<?php } else { ?>
<tr><td colspan="5" class="text-center text-muted">No score history yet.</td></tr>
<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>
