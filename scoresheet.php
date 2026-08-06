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
            <h4>Scoresheet</h4>
        </div>

        <div class="card-body">

            <?php if (isset($_GET['saved'])) { ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Scores saved successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <?php if (isset($_GET['cleared'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show">
                    Scores for this event have been cleared.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php } ?>

            <form method="GET">

                <label>Select Competition/Event</label>

                <select name="event" class="form-select" onchange="this.form.submit()">

                    <option value="">-- Select Event --</option>

                    <?php

                    $events = $conn->query("SELECT * FROM events ORDER BY event_name");

                    while ($e = $events->fetch_assoc()) {

                        $selected = (isset($_GET['event']) && $_GET['event'] == $e['id']) ? "selected" : "";

                        echo "<option value='{$e['id']}' $selected>{$e['event_name']}</option>";
                    }

                    ?>

                </select>

            </form>

            <hr>

            <?php
            // ===== YOUR CODE STARTS HERE =====
            if (isset($_GET['event'])) {

                $eventID = intval($_GET['event']);
                $event = $conn->query("SELECT * FROM events WHERE id=$eventID")->fetch_assoc();
            ?>

                <form action="actions/save_scores.php" method="POST">

                    <input type="hidden" name="event_id" value="<?= $eventID ?>">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>Team</th>
                                <th>Placement</th>
                                <th>Points</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $teams = $conn->query("SELECT * FROM teams ORDER BY team_name");

                            while ($team = $teams->fetch_assoc()) {

                                $teamID = $team['id'];

                                $saved = $conn->query("
        SELECT placement,points
        FROM scores
        WHERE event_id=$eventID
        AND team_id=$teamID
    ")->fetch_assoc();

                                $placement = $saved['placement'] ?? "";
                                $point     = $saved['points'] ?? "";

                            ?>

                                <tr class="<?php

                                            switch ($placement) {

                                                case 1:
                                                    echo 'table-warning';      // Gold
                                                    break;

                                                case 2:
                                                    echo 'table-secondary';    // Silver
                                                    break;

                                                case 3:
                                                    echo 'table-danger';       // Bronze
                                                    break;
                                            }
                                            ?>">

                                    <td>

                                        <?= htmlspecialchars($team['team_name']) ?>

                                        <input type="hidden" name="team_id[]" value="<?= $team['id'] ?>">

                                    </td>

                                    <td>

                                        <select class="form-select placement" name="placement[]">

                                            <option value="">--</option>

                                            <option value="1" <?= $placement == 1 ? 'selected' : '' ?>>1st</option>
                                            <option value="2" <?= $placement == 2 ? 'selected' : '' ?>>2nd</option>
                                            <option value="3" <?= $placement == 3 ? 'selected' : '' ?>>3rd</option>
                                            <option value="4" <?= $placement == 4 ? 'selected' : '' ?>>4th</option>
                                            <option value="5" <?= $placement == 5 ? 'selected' : '' ?>>5th</option>
                                            <option value="6" <?= $placement == 6 ? 'selected' : '' ?>>6th</option>
                                            <option value="99" <?= $placement == 99 ? 'selected' : '' ?>>Non Winner</option>


                                        </select>

                                    </td>

                                    <td>

                                        <input type="text" class="form-control points" name="points[]" value="<?= $point ?>" readonly>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                    <button class="btn btn-primary">
                        Save Scores
                    </button>

                    <a href="actions/clear_scores.php?event=<?= $eventID ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to clear all scores for this event?');">
                        Clear Scores
                    </a>
                </form>

                <script>
                    const scoring = {

                        1: <?= $event['first_place']  ?? 0 ?>,
                        2: <?= $event['second_place'] ?? 0 ?>,
                        3: <?= $event['third_place']  ?? 0 ?>,
                        4: <?= $event['fourth_place'] ?? 0 ?>,
                        5: <?= $event['fifth_place']  ?? 0 ?>,
                        6: <?= $event['sixth_place']  ?? 0 ?>,
                        99: <?= $event['non_winner']  ?? 0 ?>

                    };

                    document.querySelectorAll('.placement').forEach(function(select) {

                        select.addEventListener('change', function() {

                            let value = this.value;
                            let row = this.closest('tr');

                            if (value === "") {
                                row.querySelector('.points').value = "";
                                return;
                            }

                            let count = 0;

                            document.querySelectorAll('.placement').forEach(function(p) {
                                if (p.value === value) count++;
                            });

                            if (count > 1 && value != 99) {
                                alert("Placement already assigned.");
                                this.value = "";
                                row.querySelector('.points').value = "";
                                return;
                            }

                            row.querySelector('.points').value = scoring[value] ?? 0;

                        });

                    });
                </script>

            <?php } ?>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>