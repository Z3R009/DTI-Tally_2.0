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
    <h4>Leaderboard</h4>
</div>

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-6">

<label>Select Competition/Event</label>

<select name="event" class="form-select" onchange="this.form.submit()">

<option value="">-- Select Event --</option>

<?php

$events = $conn->query("SELECT * FROM events ORDER BY event_name");

while($e = $events->fetch_assoc()){

    $selected = "";

    if(isset($_GET['event']) && $_GET['event'] == $e['id'])
        $selected = "selected";

    echo "<option value='{$e['id']}' $selected>{$e['event_name']}</option>";
}

?>

</select>

</div>

</div>

</form>

<hr>

<?php

if(isset($_GET['event'])){

    $eventID = intval($_GET['event']);

    $event = $conn->query("SELECT * FROM events WHERE id=$eventID")->fetch_assoc();

?>

<h5 class="mb-3">
<?= htmlspecialchars($event['event_name']) ?>
</h5>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th width="10%">Rank</th>

<th>Team</th>

<th width="15%">Placement</th>

<th width="15%">Points</th>

</tr>

</thead>

<tbody>

<?php

$sql = "

SELECT

teams.team_name,
scores.placement,
scores.points

FROM scores

INNER JOIN teams
ON teams.id = scores.team_id

WHERE scores.event_id = $eventID

ORDER BY scores.points DESC, scores.placement ASC

";

$result = $conn->query($sql);

$rank = 1;
$displayRank = 1;
$lastPoints = null;

while($row = $result->fetch_assoc()){

    if($lastPoints !== null && $row['points'] < $lastPoints){
        $displayRank = $rank;
    }

    $medal = "";

    switch($displayRank){

        case 1:
            $medal = "🥇";
            $class = "table-warning";
            break;

        case 2:
            $medal = "🥈";
            $class = "table-secondary";
            break;

        case 3:
            $medal = "🥉";
            $class = "table-danger";
            break;

        default:
            $class = "";
    }

?>

<tr class="<?= $class ?>">

<td><?= $medal ?> <?= $displayRank ?></td>

<td><?= htmlspecialchars($row['team_name']) ?></td>

<td><?= $row['placement'] ?></td>

<td><strong><?= $row['points'] ?></strong></td>

</tr>

<?php

$lastPoints = $row['points'];
$rank++;

}

?>

</tbody>

</table>

<?php } ?>

</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>