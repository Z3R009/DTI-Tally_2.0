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
        align-items: flex-end;
        justify-content: center;
        gap: 40px;
        max-width: 640px;
        margin: 0 auto;
    }

    .podium-spot {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 160px;

    }

    @keyframes bounceUp {
        0% {
            opacity: 0;
            transform: translateY(80px);
        }

        50% {
            opacity: 1;
            transform: translateY(-18px);
        }

        75% {
            transform: translateY(8px);
        }

        90% {
            transform: translateY(-3px);
        }

        100% {
            transform: translateY(0);
        }
    }

    /* .podium-spot.rank-5 {
        animation-delay: .20s;
    }

    .podium-spot.rank-4 {
        animation-delay: .40s;
    }

    .podium-spot.rank-3 {
        animation-delay: .60s;
    }

    .podium-spot.rank-2 {
        animation-delay: .80s;
    }

    .podium-spot.rank-1 {
        animation-delay: 1.00s;
    } */

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
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 8px;
        border: 3px solid rgba(255, 255, 255, 0.25);
        animation: bounceUp 1.2s cubic-bezier(.22, 1, .36, 1) both;
    }

    .rank-1 .team-avatar {
        width: 180px;
        height: 180px;
        border-color: var(--gold);
        animation-delay: 1.00s;
    }

    .rank-2 .team-avatar {
        border-color: var(--silver);
        animation-delay: .80s;
    }

    .rank-3 .team-avatar {
        border-color: var(--bronze);
        animation-delay: .60s;
    }

    .rank-4 .team-avatar {
        border-color: #5B7DB1;
        animation-delay: .40s;
    }

    .rank-5 .team-avatar {
        border-color: #4CAF50;
        animation-delay: .20s;
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
        font-size: 20px;
        color: gold;
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
        height: 150px;
        background: linear-gradient(180deg, var(--gold), #d69a2b);
        color: var(--gold-dark);
    }

    .rank-2 .podium-block {
        height: 120px;
        background: linear-gradient(180deg, var(--silver), #9aa5b1);
        color: var(--silver-dark);
    }

    .rank-3 .podium-block {
        height: 100px;
        background: linear-gradient(180deg, var(--bronze), #b96b34);
        color: var(--bronze-dark);
    }

    .rank-4 .podium-block {
        height: 70px;
        background: #5B7DB1;
        color: var(--bronze-dark);
    }

    .rank-5 .podium-block {
        height: 50px;
        background: #4CAF50;
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

    .medal-badge.place4 {
        background: #e4ecf6;
        color: #3d5a80;
    }

    .medal-badge.place5 {
        background: #e3f3e5;
        color: #2e7d32;
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

    /* idle slideshow */

    .idle-slideshow {
        position: fixed;
        inset: 0;
        z-index: 9999;

        background:
            radial-gradient(circle at 50% 35%,
                var(--team-color-light, #1e3a8a) 0%,
                var(--team-color, #0b1e78) 35%,
                var(--team-color-dark, #050d33) 100%);

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        opacity: 0;
        visibility: hidden;

        transition:
            opacity 0.6s ease,
            background 0.8s ease;

        padding: 24px;
        overflow: hidden;
    }

    .idle-slideshow::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at center,
                transparent 20%,
                rgba(0, 0, 0, 0.35) 100%);
        pointer-events: none;
    }

    .idle-slideshow>* {
        position: relative;
        z-index: 1;
    }

    .idle-slideshow.visible {
        opacity: 1;
        visibility: visible;
    }

    @media (prefers-reduced-motion: reduce) {
        .idle-slideshow {
            transition: none;
        }
    }

    .idle-eyebrow {
        font-size: 0.9rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--gold);
        font-weight: 600;
        margin-bottom: 14px;
    }

    .idle-event-name {
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        font-size: clamp(1.6rem, 4vw, 2.4rem);
        text-transform: uppercase;
        max-width: 800px;
        margin-bottom: 32px;
    }

    .idle-team-avatar {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: #fff;
        border: 4px solid var(--gold);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .idle-team-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .idle-team-avatar span {
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        font-size: 3rem;
        color: var(--navy);
    }

    .idle-team-name {
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        font-size: clamp(2.2rem, 5vw, 4.2rem);
        line-height: 1.05;
        text-transform: uppercase;
        margin-bottom: 8px;

        /* High contrast against the team-color background */
        color: #fff;
        -webkit-text-stroke: 1px rgba(0, 0, 0, 0.25);

        text-shadow:
            0 2px 4px rgba(0, 0, 0, 0.75),
            0 5px 14px rgba(0, 0, 0, 0.65),
            0 0 24px rgba(0, 0, 0, 0.45);

        transition: color 0.6s ease, text-shadow 0.6s ease;
    }

    .idle-team-points {
        font-size: 30px;
        color: var(--gold);
        font-weight: 600;
        margin-bottom: 40px;
    }

    .idle-dots {
        display: flex;
        gap: 8px;
        margin-bottom: 18px;
    }

    .idle-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transition: background 0.3s ease;
    }

    .idle-dot.active {
        background: var(--gold);
    }

    .idle-hint {
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.45);
        letter-spacing: 0.04em;
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

$top3 = array_slice($standings, 0, 5);

$eventWinnersSql = "
SELECT
    events.event_name,
    teams.team_name,
    teams.logo,
    scores.points
FROM events
JOIN scores ON scores.event_id = events.id AND scores.placement = 1
JOIN teams ON teams.id = scores.team_id
ORDER BY events.event_name";

$eventWinnersResult = $conn->query($eventWinnersSql);

$eventWinners = [];

while ($w = $eventWinnersResult->fetch_assoc()) {
    $eventWinners[] = [
        'event_name' => $w['event_name'],
        'team_name'  => $w['team_name'],
        'logo_url'   => team_logo_url($w['logo']),
        'points'     => $w['points'],
    ];
}

?>

<div class="rankings-hero">

    <div class="hero-eyebrow"><i class="bi bi-star-fill"></i> Live Standings</div>
    <h1 class="hero-title">Overall Rankings</h1>

    <?php if (count($top3) > 0) { ?>

        <div class="podium">

            <?php if (isset($top3[3])) { ?>
                <div class="podium-spot rank-4">
                    <div class="team-avatar">
                        <?php $logoUrl = team_logo_url($top3[3]['logo']); ?>
                        <?php if ($logoUrl) { ?>
                            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                        <?php } else { ?>
                            <span class="avatar-initial"><?= htmlspecialchars(strtoupper(substr($top3[3]['team_name'], 0, 1))) ?></span>
                        <?php } ?>
                        <!-- <span class="avatar-medal silver"><i class="bi bi-award-fill"></i></span> -->
                    </div>
                    <div class="podium-team"><?= htmlspecialchars($top3[3]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[3]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[3]['rank'] ?></div>
                </div>
            <?php } ?>

            <?php if (isset($top3[1])) { ?>
                <div class="podium-spot rank-2">
                    <div class="team-avatar">
                        <?php $logoUrl = team_logo_url($top3[1]['logo']); ?>
                        <?php if ($logoUrl) { ?>
                            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                        <?php } else { ?>
                            <span class="avatar-initial"><?= htmlspecialchars(strtoupper(substr($top3[1]['team_name'], 0, 1))) ?></span>
                        <?php } ?>
                        <!-- <span class="avatar-medal silver"><i class="bi bi-award-fill"></i></span> -->
                    </div>
                    <div class="podium-team"><?= htmlspecialchars($top3[1]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[1]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[1]['rank'] ?></div>
                </div>
            <?php } ?>

            <div class="podium-spot rank-1">
                <div class="team-avatar">
                    <?php $logoUrl = team_logo_url($top3[0]['logo']); ?>
                    <?php if ($logoUrl) { ?>
                        <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                    <?php } else { ?>
                        <span class="avatar-initial"><?= htmlspecialchars(strtoupper(substr($top3[0]['team_name'], 0, 1))) ?></span>
                    <?php } ?>
                    <!-- <span class="avatar-medal gold"><i class="bi bi-trophy-fill"></i></span> -->
                </div>
                <div class="podium-team"><?= htmlspecialchars($top3[0]['team_name']) ?></div>
                <div class="podium-points"><?= $top3[0]['total'] ?> pts</div>
                <div class="podium-block"><?= $top3[0]['rank'] ?></div>
            </div>

            <?php if (isset($top3[2])) { ?>
                <div class="podium-spot rank-3">
                    <div class="team-avatar">
                        <?php $logoUrl = team_logo_url($top3[2]['logo']); ?>
                        <?php if ($logoUrl) { ?>
                            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                        <?php } else { ?>
                            <span class="avatar-initial"><?= htmlspecialchars(strtoupper(substr($top3[2]['team_name'], 0, 1))) ?></span>
                        <?php } ?>
                        <!-- <span class="avatar-medal bronze"><i class="bi bi-award-fill"></i></span> -->
                    </div>
                    <div class="podium-team"><?= htmlspecialchars($top3[2]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[2]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[2]['rank'] ?></div>
                </div>
            <?php } ?>

            <?php if (isset($top3[4])) { ?>
                <div class="podium-spot rank-5">
                    <div class="team-avatar">
                        <?php $logoUrl = team_logo_url($top3[4]['logo']); ?>
                        <?php if ($logoUrl) { ?>
                            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="">
                        <?php } else { ?>
                            <span class="avatar-initial"><?= htmlspecialchars(strtoupper(substr($top3[4]['team_name'], 0, 1))) ?></span>
                        <?php } ?>
                        <!-- <span class="avatar-medal silver"><i class="bi bi-award-fill"></i></span> -->
                    </div>
                    <div class="podium-team"><?= htmlspecialchars($top3[4]['team_name']) ?></div>
                    <div class="podium-points"><?= $top3[4]['total'] ?> pts</div>
                    <div class="podium-block"><?= $top3[4]['rank'] ?></div>
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
                                <?php } elseif ($row['rank'] == 4) { ?>
                                    <span class="medal-badge place4"><?= $row['rank'] ?></span>
                                <?php } elseif ($row['rank'] == 5) { ?>
                                    <span class="medal-badge place5"><?= $row['rank'] ?></span>
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

<div id="idleSlideshow" class="idle-slideshow">
    <div class="idle-eyebrow">Event Champion</div>
    <div class="idle-event-name" id="idleEventName"></div>
    <div class="idle-team-avatar" id="idleTeamAvatar"></div>
    <div class="idle-team-name" id="idleTeamName"></div>
    <div class="idle-team-points" id="idleTeamPoints"></div>
    <div class="idle-dots" id="idleDots"></div>
    <div class="idle-hint">Move or tap to return to standings</div>
</div>

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

<script>
    (function() {

        const winners = <?= json_encode($eventWinners) ?>;

        if (!winners.length) return;

        const IDLE_DELAY = 20000;
        const SLIDE_INTERVAL = 4500;

        function getTeamColors(teamName) {
            const name = teamName.toLowerCase();

            if (name.includes("blue")) {
                return {
                    main: "#2563eb",
                    light: "#60a5fa",
                    dark: "#071a4d"
                };
            }

            if (name.includes("red")) {
                return {
                    main: "#dc2626",
                    light: "#f87171",
                    dark: "#4a0808"
                };
            }

            if (name.includes("green")) {
                return {
                    main: "#16a34a",
                    light: "#4ade80",
                    dark: "#052e16"
                };
            }

            if (name.includes("yellow") || name.includes("gold")) {
                return {
                    main: "#eab308",
                    light: "#fde047",
                    dark: "#422006"
                };
            }

            if (name.includes("orange")) {
                return {
                    main: "#ea580c",
                    light: "#fb923c",
                    dark: "#431407"
                };
            }

            if (name.includes("violet")) {
                return {
                    main: "#9333ea",
                    light: "#c084fc",
                    dark: "#2e1065"
                };
            }

            if (name.includes("pink")) {
                return {
                    main: "#db2777",
                    light: "#f472b6",
                    dark: "#500724"
                };
            }

            // Default color
            return {
                main: "#0b1e78",
                light: "#60a5fa",
                dark: "#050d33"
            };
        }

        const overlay = document.getElementById("idleSlideshow");
        const eventNameEl = document.getElementById("idleEventName");
        const avatarEl = document.getElementById("idleTeamAvatar");
        const teamNameEl = document.getElementById("idleTeamName");
        const pointsEl = document.getElementById("idleTeamPoints");
        const dotsEl = document.getElementById("idleDots");

        let currentIndex = 0;
        let idleTimer = null;
        let slideTimer = null;

        winners.forEach(function() {
            const dot = document.createElement("span");
            dot.className = "idle-dot";
            dotsEl.appendChild(dot);
        });

        function renderSlide() {

            const winner = winners[currentIndex];

            eventNameEl.textContent = winner.event_name;
            teamNameEl.textContent = winner.team_name;
            pointsEl.textContent = winner.points + " pts \u00b7 1st Place";

            // Get colors from team name
            const colors = getTeamColors(winner.team_name);

            // Apply colors to slideshow
            overlay.style.setProperty("--team-color", colors.main);
            overlay.style.setProperty("--team-color-light", colors.light);
            overlay.style.setProperty("--team-color-dark", colors.dark);

            if (winner.logo_url) {
                avatarEl.innerHTML = "";
                const img = document.createElement("img");
                img.src = winner.logo_url;
                img.alt = "";
                avatarEl.appendChild(img);
            } else {
                avatarEl.innerHTML = "<span>" + winner.team_name.charAt(0).toUpperCase() + "</span>";
            }

            Array.prototype.forEach.call(dotsEl.children, function(dot, i) {
                dot.classList.toggle("active", i === currentIndex);
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % winners.length;
            renderSlide();
        }

        function startSlideshow() {
            currentIndex = 0;
            renderSlide();
            overlay.classList.add("visible");
            slideTimer = setInterval(nextSlide, SLIDE_INTERVAL);
        }

        function stopSlideshow() {
            overlay.classList.remove("visible");
            clearInterval(slideTimer);
        }

        function resetIdleTimer() {
            stopSlideshow();
            clearTimeout(idleTimer);
            idleTimer = setTimeout(startSlideshow, IDLE_DELAY);
        }

        ["mousemove", "mousedown", "keydown", "touchstart", "scroll", "click"].forEach(function(evt) {
            document.addEventListener(evt, resetIdleTimer, {
                passive: true
            });
        });

        resetIdleTimer();

    })();
</script>