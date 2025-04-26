<?php
session_start();
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $sql  = "SELECT id, username, email, password, email_verified FROM users WHERE email = $1 LIMIT 1";
    $stmt = pg_prepare($dbconn, "login_user", $sql);
    $res  = pg_execute($dbconn, "login_user", array($email));

    if (pg_num_rows($res) === 1) {
        $row = pg_fetch_assoc($res);
        if (!password_verify($password, $row['password'])) {
            $error = "Parolă incorectă!";
        } elseif (!$row['email_verified']) {
            $error = "Contul nu este confirmat. Vă rugăm să verificați emailul pentru linkul de confirmare.";
        } else {
            $_SESSION['user_id']  = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email']    = $row['email'];
            header("Location: ../index.php");
            exit;
        }
    } else {
        $error = "Nu există cont cu acest email!";
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login-register.css">
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
  <div id="particles-js"></div>
  <div class="auth-container">
    <div class="auth-overlay"></div>
    <div class="auth-card">
      <h2>Login</h2>
      <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
      <?php endif; ?>
      <form method="POST" action="">
        <input type="email" name="email" placeholder="Introduceți emailul" required>
        <input type="password" name="password" placeholder="Introduceți parola" required>
        <button type="submit">Autentificare</button>
      </form>
      <div class="auth-extra">
        <a href="forgot_password.php">Am uitat parola?</a>
      </div>
      <div class="register-link">
        Nu ai cont? <a href="register.php">Înregistrează-te</a>
      </div>
    </div>
  </div>
  <script src="../js/particle-init.js"></script>
</body>
</html>
