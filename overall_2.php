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
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-end;
        gap: 20px;
        max-width: 1200px;
        margin: auto;
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
        font-size: 3.5rem;
    }

    .rank-2 .medal-icon {
        color: var(--silver);
    }

    .rank-3 .medal-icon {
        color: var(--bronze);
    }

    .team-avatar {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 8px;
        border: 3px solid rgba(255, 255, 255, 0.25);
    }

    .rank-1 .team-avatar {
        width: 150px;
        height: 150px;
        border-color: var(--gold);
    }

    .rank-2 .team-avatar {
        border-color: var(--silver);
    }

    .rank-3 .team-avatar {
        border-color: var(--bronze);
    }

    .team-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-avatar .avatar-initial {
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--navy);
    }

    .avatar-medal {
        position: absolute;
        bottom: -2px;
        right: -2px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        border: 2px solid var(--navy-deep);
    }

    .avatar-medal.gold {
        background: var(--gold);
        color: var(--gold-dark);
    }

    .avatar-medal.silver {
        background: var(--silver);
        color: var(--silver-dark);
    }

    .avatar-medal.bronze {
        background: var(--bronze);
        color: var(--bronze-dark);
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

    .rank-other .team-avatar {
        width: 90px;
        height: 90px;
        border-color: #ddd;
    }

    .rank-other .podium-block {
        height: 55px;
        background: #dee2e6;
        color: #495057;
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

    .team-cell-inner {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .team-thumb {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--paper);
        border: 1px solid #e7e9f0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .team-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-thumb .thumb-initial {
        font-family: 'Oswald', sans-serif;
        font-weight: 600;
        font-size: 0.8rem;
        color: var(--navy);
    }



    .admin-access-btn {
        display: none;
    }


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

function team_logo_url($logo)
{
    if ($logo && file_exists(__DIR__ . '/assets/images/team-logos/' . $logo)) {
        return 'assets/images/team-logos/' . rawurlencode($logo);
    }
    return null;
}

$sql = "
SELECT
    teams.team_name,
    teams.logo,
    COALESCE(SUM(scores.points),0) AS total
FROM teams
LEFT JOIN scores
    ON teams.id = scores.team_id
GROUP BY teams.id, teams.team_name, teams.logo
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
        'logo'      => $row['logo'],
        'total'     => $row['total'],
    ];

    $lastScore = $row['total'];
    $rank++;
}

$podiumTeams = $standings;

?>

<div class="rankings-hero">

    <div class="hero-eyebrow"><i class="bi bi-star-fill"></i> Live Standings</div>
    <h1 class="hero-title">Overall Rankings</h1>

    <?php if (count($podiumTeams) > 0) { ?>

        <div class="podium">

            <?php foreach ($podiumTeams as $team) { ?>

                <?php

                $class = '';

                switch ($team['rank']) {
                    case 1:
                        $class = 'rank-1';
                        break;
                    case 2:
                        $class = 'rank-2';
                        break;
                    case 3:
                        $class = 'rank-3';
                        break;
                    default:
                        $class = 'rank-other';
                }

                ?>

                <div class="podium-spot <?= $class ?>">

                    <div class="team-avatar">

                        <?php $logoUrl = team_logo_url($team['logo']); ?>

                        <?php if ($logoUrl) { ?>

                            <img src="<?= htmlspecialchars($logoUrl) ?>">

                        <?php } else { ?>

                            <span class="avatar-initial">
                                <?= strtoupper(substr($team['team_name'], 0, 1)) ?>
                            </span>

                        <?php } ?>

                    </div>

                    <div class="podium-team">
                        <?= htmlspecialchars($team['team_name']) ?>
                    </div>

                    <div class="podium-points">
                        <?= $team['total'] ?> pts
                    </div>

                    <div class="podium-block">
                        <?= $team['rank'] ?>
                    </div>

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
                                    <span class="medal-badge silver"><?= $row['rank'] ?></span>
                                <?php } elseif ($row['rank'] == 2) { ?>
                                    <span class="medal-badge silver"><?= $row['rank'] ?></span>
                                <?php } elseif ($row['rank'] == 3) { ?>
                                    <span class="medal-badge bronze"><?= $row['rank'] ?></span>
                                <?php } else { ?>
                                    <?= $row['rank'] ?>
                                <?php } ?>
                            </td>
                            <td class="team-cell">
                                <div class="team-cell-inner">
                                    <div class="team-thumb">
                                        <?php $logoUrl = team_logo_url($row['logo']); ?>
                                        <?php if ($logoUrl) { ?>
                                            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                                        <?php } else { ?>
                                            <span class="thumb-initial"><?= htmlspecialchars(strtoupper(substr($row['team_name'], 0, 1))) ?></span>
                                        <?php } ?>
                                    </div>
                                    <span><?= htmlspecialchars($row['team_name']) ?></span>
                                </div>
                            </td>
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
                e.preventDefault();
                adminBtn.style.display = "flex";
            }
        });

        document.addEventListener("keyup", function(e) {
            if (e.code === "Space") {
                adminBtn.style.display = "none";
            }
        });

    });
</script>