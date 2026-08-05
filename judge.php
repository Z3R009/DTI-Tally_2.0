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
<h4>Judge</h4>
</div>

<div class="card-body text-center text-muted py-5">
<i class="bi bi-hammer" style="font-size:2.5rem;"></i>
<p class="mt-3 mb-0">Judge scoring isn't set up yet — coming soon.</p>
</div>

</div>

</div>

<?php include 'includes/footer.php'; ?>
