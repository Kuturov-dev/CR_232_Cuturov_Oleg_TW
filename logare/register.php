<?php
session_start();
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm) {
        $error = "Parolele nu coincid!";
    } else {
        $checkSql  = "SELECT id FROM users WHERE email = $1 LIMIT 1";
        $checkStmt = pg_prepare($dbconn, "check_user", $checkSql);
        $checkRes  = pg_execute($dbconn, "check_user", array($email));
        
        if (pg_num_rows($checkRes) > 0) {
            $error = "Deja există un cont cu acest email!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Generăm un token pentru confirmarea emailului
            $emailToken = bin2hex(random_bytes(16));
            // Inserăm contul nou, setând implicit email_verified la false
            $insertSql  = "INSERT INTO users (username, email, password, email_token) VALUES ($1, $2, $3, $4)";
            $insertStmt = pg_prepare($dbconn, "insert_user", $insertSql);
            $insertRes  = pg_execute($dbconn, "insert_user", array($username, $email, $hashedPassword, $emailToken));
            
            if ($insertRes) {
                // În producție, aici s-ar trimite un email cu link-ul de confirmare.
                // Pentru test local, afișăm direct link-ul de confirmare:
                $success = "Înregistrare reușită! Verificați emailul pentru a vă confirma contul.<br>" .
                           "Link de test: <a href='verify_email.php?token={$emailToken}'>Click aici pentru confirmare</a>";
            } else {
                $error = "Eroare la înregistrare!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="../css/login-register.css">
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
  <div id="particles-js"></div>
  <div class="auth-container">
    <div class="auth-overlay"></div>
    <div class="auth-card">
      <h2>Create an account</h2>
      <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
      <?php endif; ?>
      <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
      <?php else: ?>
      <form method="POST" action="">
        <input type="text" name="username" placeholder="Enter your username" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="password" name="confirm_password" placeholder="Confirm your password" required>
        <button type="submit">Register</button>
      </form>
      <div class="login-link">
        Already have an account? <a href="login.php">Log In</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <script src="../js/particle-init.js"></script>
</body>
</html>
