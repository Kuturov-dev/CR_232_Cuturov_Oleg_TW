<?php
session_start();
require_once __DIR__ . '/../database.php';

if (!isset($_GET['token'])) {
    die("Token lipsă!");
}

$token = $_GET['token'];
$sql = "SELECT id, reset_expires FROM users WHERE reset_token = $1 LIMIT 1";
$stmt = pg_prepare($dbconn, "find_token", $sql);
$res = pg_execute($dbconn, "find_token", array($token));

if (pg_num_rows($res) !== 1) {
    die("Token invalid sau expirat!");
}

$user = pg_fetch_assoc($res);
$current_time = time();
$token_expiry = strtotime($user['reset_expires']);
if ($current_time > $token_expiry) {
    die("Token expirat!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    
    if ($password !== $confirm) {
        $error = "Parolele nu coincid!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET password = $1, reset_token = NULL, reset_expires = NULL WHERE id = $2";
        $updateStmt = pg_prepare($dbconn, "update_password", $updateSql);
        $updateRes = pg_execute($dbconn, "update_password", array($hashedPassword, $user['id']));
        if ($updateRes) {
            $success = "Parola a fost resetată cu succes. Poți să te autentifici acum.";
        } else {
            $error = "Eroare la resetarea parolei!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <title>Resetare parolă</title>
  <link rel="stylesheet" href="../css/login-register.css">
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
  <div id="particles-js"></div>
  <div class="auth-container">
    <div class="auth-overlay"></div>
    <div class="auth-card">
      <h2>Resetare parolă</h2>
      <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
      <?php endif; ?>
      <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
        <div class="login-link">
          <a href="login.php">Autentifică-te</a>
        </div>
      <?php else: ?>
        <form method="POST" action="">
          <input type="password" name="password" placeholder="Noua parolă" required>
          <input type="password" name="confirm_password" placeholder="Confirmă noua parolă" required>
          <button type="submit">Resetează parola</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
  <script src="../js/particle-init.js"></script>
</body>
</html>
