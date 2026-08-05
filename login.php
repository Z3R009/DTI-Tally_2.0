<?php
include 'includes/auth.php';
include 'config/database.php';

if (is_logged_in()) {
    header("Location: overall.php");
    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $username;
        header("Location: overall.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center vh-100" style="background:#f4f6f9;">

    <div class="card p-4 shadow-sm" style="width:100%; max-width:380px;">

        <h4 class="mb-3 text-center">Admin Login</h4>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autocomplete="off" required autofocus>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Log In</button>

        </form>

        <div class="text-center mt-3">
            <a href="overall.php" class="small text-muted">&larr; Back to Rankings</a>
        </div>

    </div>

</body>

</html>