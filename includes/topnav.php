<?php $current = basename($_SERVER['PHP_SELF']); ?>

<div class="container-fluid pt-3">
<div class="tab-nav">

<a href="scoresheet.php" class="tab-btn <?= $current=='scoresheet.php' ? 'active' : '' ?>">
<i class="bi bi-grid-3x3-gap-fill"></i> ScoreSheet
</a>

<a href="events.php" class="tab-btn <?= in_array($current,['events.php','edit_event.php']) ? 'active' : '' ?>">
<i class="bi bi-link-45deg"></i> Events
</a>

<a href="teams.php" class="tab-btn <?= in_array($current,['teams.php','edit_team.php']) ? 'active' : '' ?>">
<i class="bi bi-people-fill"></i> Teams
</a>

<a href="leaderboard.php" class="tab-btn <?= $current=='leaderboard.php' ? 'active' : '' ?>">
<i class="bi bi-trophy-fill"></i> Leaderboards
</a>

<a href="overall.php" class="tab-btn <?= $current=='overall.php' ? 'active' : '' ?>">
<i class="bi bi-award-fill"></i> Overall Rankings
</a>

<a href="judge.php" class="tab-btn <?= $current=='judge.php' ? 'active' : '' ?>">
<i class="bi bi-hammer"></i> Judge
</a>

<a href="history.php" class="tab-btn <?= $current=='history.php' ? 'active' : '' ?>">
<i class="bi bi-clock-history"></i> History
</a>

<a href="logout.php" class="tab-btn tab-btn-logout">
<i class="bi bi-box-arrow-right"></i> Logout
</a>

</div>
</div>
