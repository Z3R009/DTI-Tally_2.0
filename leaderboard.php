<?php
include 'config/database.php';
include 'includes/auth.php';

include 'includes/header.php';
?>

<?php if (is_logged_in()) {
    include 'includes/topnav.php';
} ?>

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    .overall-btn {
        display: inline-block;
        padding: 10px 24px;
        background-color: #0d6efd;
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: 0.3s ease;
        border: none;
    }

    .overall-btn:hover {
        background-color: #0b5ed7;
        color: #fff;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(13, 110, 253, .3);
    }

    /* Back to Top Button */

    #backToTop {
        position: fixed;
        bottom: 25px;
        right: 25px;
        width: 55px;
        height: 55px;
        border: none;
        border-radius: 50%;
        background: #0d6efd;
        color: #fff;
        font-size: 22px;
        display: none;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .25);
        transition: all .3s ease;
        z-index: 9999;
    }

    #backToTop:hover {
        background: #0b5ed7;
        transform: translateY(-4px);
    }
</style>


<div class="container-fluid p-4">

    <h2 class="mb-4">
        🏆 Leaderboards
    </h2>

    <div class="row">

        <?php

        $events = $conn->query("
SELECT *
FROM events
ORDER BY category,event_name
");

        while ($event = $events->fetch_assoc()) {

            $eventID = $event['id'];

        ?>

            <div class="col-lg-6 mb-4">

                <div class="card shadow h-100">

                    <div class="card-header bg-primary text-white">

                        <h5 class="mb-0">
                            🏆 <?= htmlspecialchars($event['event_name']) ?>
                        </h5>

                        <small><?= htmlspecialchars($event['category']) ?></small>

                    </div>

                    <div class="card-body p-0">

                        <?php

                        $sql = "

SELECT

teams.team_name,
scores.points

FROM scores

INNER JOIN teams
ON teams.id=scores.team_id

WHERE scores.event_id=?

ORDER BY
scores.points DESC,
teams.team_name ASC

";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $eventID);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        ?>

                        <table class="table table-hover table-striped mb-0">

                            <thead class="table-dark">

                                <tr>

                                    <th width="15%">Rank</th>

                                    <th>Team</th>

                                    <th width="20%">Points</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                if ($result->num_rows == 0) {

                                ?>

                                    <tr>

                                        <td colspan="3" class="text-center text-muted">

                                            No scores entered yet.

                                        </td>

                                    </tr>

                                    <?php

                                } else {

                                    $rank = 1;
                                    $displayRank = 1;
                                    $lastPoints = null;

                                    while ($row = $result->fetch_assoc()) {

                                        if ($lastPoints !== null && $row['points'] < $lastPoints) {

                                            $displayRank = $rank;
                                        }

                                        $medal = "";
                                        $class = "";

                                        switch ($displayRank) {

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
                                        }

                                    ?>

                                        <tr class="<?= $class ?>">

                                            <td>

                                                <?= $medal ?>

                                                <?= $displayRank ?>

                                            </td>

                                            <td>

                                                <strong>

                                                    <?= htmlspecialchars($row['team_name']) ?>

                                                </strong>

                                            </td>

                                            <td>

                                                <?= $row['points'] ?>

                                            </td>

                                        </tr>

                                <?php

                                        $lastPoints = $row['points'];
                                        $rank++;
                                    }
                                }

                                ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</div>

<center>
    <a href="overall.php" class="overall-btn">
        Go to Overall
    </a>
</center>

<button id="backToTop" title="Back to Top">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
    // Back to Top Button

    const backToTop = document.getElementById("backToTop");

    // Show button after scrolling down
    window.addEventListener("scroll", function() {

        if (window.scrollY > 300) {
            backToTop.style.display = "flex";
        } else {
            backToTop.style.display = "none";
        }

    });

    // Smooth scroll to top
    backToTop.addEventListener("click", function() {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });
</script>

<?php include 'includes/footer.php'; ?>