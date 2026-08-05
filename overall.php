<?php
include 'config/database.php';
include 'includes/auth.php';
// include 'includes/header.php';
?>

<?php if (is_logged_in()) {
    include 'includes/topnav.php';
} ?>

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    :root {
        --navy-deep: #050d33;
        --navy: #0b1e78;
        --gold: #f6c453;
        --gold-dark: #8a5a10;
        --silver: #cbd2dc;
        --silver-dark: #4b5563;
        --bronze: #e2985a;
        --bronze-dark: #7a431a;
        --paper: #f7f8fb;
        --ink: #1b2338;
        --muted: #6b7280;
    }

    .rankings-hero {
        background: radial-gradient(circle at 50% -10%, var(--navy) 0%, var(--navy-deep) 65%);
        padding: 48px 24px 0;
        text-align: center;
        color: #fff;
        margin: -1.5rem -0.75rem 0;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--gold);
        font-weight: 600;
        margin-bottom: 10px;
    }

    .hero-title {
        font-family: 'Oswald', sans-serif;
        font-size: clamp(1.8rem, 5vw, 2.8rem);
        font-weight: 700;
        letter-spacing: 0.02em;
        margin: 0 0 36px;
        text-transform: uppercase;
    }

    .podium {
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 16px;
        max-width: 640px;
        margin: 0 auto;
    }

    .podium-spot {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 160px;
        animation: rise 0.6s ease both;
    }

    .podium-spot.rank-2 {
        animation-delay: 0.05s;
    }

    .podium-spot.rank-1 {
        animation-delay: 0.2s;
    }

    .podium-spot.rank-3 {
        animation-delay: 0.35s;
    }

    @keyframes rise {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .podium-spot {
            animation: none;
        }
    }

    .medal-icon {
        font-size: 1.5rem;
        margin-bottom: 6px;
    }

    .rank-1 .medal-icon {
        color: var(--gold);
        font-size: 1.9rem;
    }

    .rank-2 .medal-icon {
        color: var(--silver);
    }

    .rank-3 .medal-icon {
        color: var(--bronze);
    }

    .podium-team {
        font-family: 'Oswald', sans-serif;
        font-size: 1.05rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }

    .podium-points {
        font-size: 0.82rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 14px;
    }

    .podium-block {
        width: 100%;
        border-radius: 12px 12px 0 0;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding-top: 12px;
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        font-size: 1.9rem;
    }

    .rank-1 .podium-block {
        height: 132px;
        background: linear-gradient(180deg, var(--gold), #d69a2b);
        color: var(--gold-dark);
    }

    .rank-2 .podium-block {
        height: 98px;
        background: linear-gradient(180deg, var(--silver), #9aa5b1);
        color: var(--silver-dark);
    }

    .rank-3 .podium-block {
        height: 70px;
        background: linear-gradient(180deg, var(--bronze), #b96b34);
        color: var(--bronze-dark);
    }

    .standings-wrap {
        padding: 32px 4px 8px;
        max-width: 680px;
        margin: 0 auto;
    }

    .standings-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #e7e9f0;
        overflow: hidden;
    }

    .standings-card table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .standings-card thead th {
        text-align: left;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--muted);
        padding: 14px 20px;
        border-bottom: 1px solid #eef0f4;
        background: none;
    }

    .standings-card tbody td {
        padding: 13px 20px;
        border-bottom: 1px solid #f1f2f6;
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .standings-card tbody tr:last-child td {
        border-bottom: none;
    }

    .standings-card tbody tr:hover {
        background: #fafbfd;
    }

    .rank-cell {
        font-family: 'Oswald', sans-serif;
        font-weight: 600;
        width: 56px;
    }

    .medal-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        font-size: 0.72rem;
        font-weight: 700;
    }

    .medal-badge.gold {
        background: #fdf1d6;
        color: var(--gold-dark);
    }

    .medal-badge.silver {
        background: #eceef2;
        color: var(--silver-dark);
    }

    .medal-badge.bronze {
        background: #f6e3d3;
        color: var(--bronze-dark);
    }

    .team-cell {
        font-weight: 500;
        color: var(--ink);
    }

    .points-cell {
        font-family: 'Oswald', sans-serif;
        font-weight: 600;
        text-align: right;
    }


    /* hide button */

    .admin-access-btn {
        display: none;
    }

    /* leaderboard button */

    .leaderboard-btn {
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

    .leaderboard-btn:hover {
        background-color: #0b5ed7;
        color: #fff;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(13, 110, 253, .3);
    }
</style>

<?php

$sql = "
SELECT
    teams.team_name,
    COALESCE(SUM(scores.points),0) AS total
FROM teams
LEFT JOIN scores
    ON teams.id = scores.team_id
GROUP BY teams.id, teams.team_name
ORDER BY total DESC";

$result = $conn->query($sql);

$standings = [];
$rank = 1;
$displayRank = 1;
$lastScore = null;

while ($row = $result->fetch_assoc()) {

    if ($lastScore !== null && $row['total'] < $lastScore) {
        $displayRank = $rank;
    }

    $standings[] = [
        'rank'      => $displayRank,
        'team_name' => $row['team_name'],
        'total'     => $row['total'],
    ];

    $lastScore = $row['total'];
    $rank++;
}

$top3 = array_slice($standings, 0, 3);

?>

<div class="rankings-hero">

    <div class="hero-eyebrow"><i class="bi bi-star-fill"></i> Live Standings</div>
    <h1 class="hero-title">Overall Rankings</h1>

    <?php if (count($top3) > 0) { ?>

        <div class="podium">

            <?php if (isset($top3[1])) { ?>
                <div class="podium-spot rank-2">
                    <i class="bi bi-award-fill medal-icon"></i>
                    <div class="podium-team"><?= htmlspecialchars($top3[1]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[1]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[1]['rank'] ?></div>
                </div>
            <?php } ?>

            <div class="podium-spot rank-1">
                <i class="bi bi-trophy-fill medal-icon"></i>
                <div class="podium-team"><?= htmlspecialchars($top3[0]['team_name']) ?></div>
                <div class="podium-points"><?= $top3[0]['total'] ?> pts</div>
                <div class="podium-block"><?= $top3[0]['rank'] ?></div>
            </div>

            <?php if (isset($top3[2])) { ?>
                <div class="podium-spot rank-3">
                    <i class="bi bi-award-fill medal-icon"></i>
                    <div class="podium-team"><?= htmlspecialchars($top3[2]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[2]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[2]['rank'] ?></div>
                </div>
            <?php } ?>

        </div>

    <?php } ?>

</div>

<div class="standings-wrap">
    <div class="standings-card">
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Team</th>
                    <th style="text-align:right;">Points</th>
                </tr>
            </thead>
            <tbody>

                <?php if (count($standings) > 0) { ?>

                    <?php foreach ($standings as $row) { ?>
                        <tr>
                            <td class="rank-cell">
                                <?php if ($row['rank'] == 1) { ?>
                                    <span class="medal-badge gold"><?= $row['rank'] ?></span>
                                <?php } elseif ($row['rank'] == 2) { ?>
                                    <span class="medal-badge silver"><?= $row['rank'] ?></span>
                                <?php } elseif ($row['rank'] == 3) { ?>
                                    <span class="medal-badge bronze"><?= $row['rank'] ?></span>
                                <?php } else { ?>
                                    <?= $row['rank'] ?>
                                <?php } ?>
                            </td>
                            <td class="team-cell"><?= htmlspecialchars($row['team_name']) ?></td>
                            <td class="points-cell"><?= $row['total'] ?></td>
                        </tr>
                    <?php } ?>

                <?php } else { ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">Standings will appear once scores are in.</td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<center>
    <a href="leaderboard.php" class="leaderboard-btn"></i> Go to Leaderboards</a>
</center>

<?php if (!is_logged_in()) { ?>
    <a href="login.php" id="adminAccessBtn" class="admin-access-btn" title="Admin">
        <i class="bi bi-gear-fill"></i>
    </a>
<?php } ?>

<?php include 'includes/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const adminBtn = document.getElementById("adminAccessBtn");

        if (!adminBtn) return;

        document.addEventListener("keydown", function(e) {
            if (e.code === "Space") {
                e.preventDefault(); // Prevent page scrolling
                adminBtn.style.display = "flex"; // or "block"/"inline-flex"
            }
        });

        document.addEventListener("keyup", function(e) {
            if (e.code === "Space") {
                adminBtn.style.display = "none";
            }
        });

    });
</script>