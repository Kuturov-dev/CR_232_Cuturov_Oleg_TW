<?php
session_start();
require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (!empty($email)) {
        $sql = "SELECT id FROM users WHERE email = $1 LIMIT 1";
        $stmt = pg_prepare($dbconn, "find_user", $sql);
        $res  = pg_execute($dbconn, "find_user", array($email));
        
        if (pg_num_rows($res) === 1) {
            $user = pg_fetch_assoc($res);
            
            $token   = bin2hex(random_bytes(16));
            $expires = time() + 3600; 
            
            $updateSql  = "UPDATE users SET reset_token = $1, reset_expires = to_timestamp($2) WHERE id = $3";
            $updateStmt = pg_prepare($dbconn, "update_token", $updateSql);
            $updateRes  = pg_execute($dbconn, "update_token", array($token, $expires, $user['id']));
            
            if ($updateRes) {
                $success = "La adresa dumneavoastră de email a fost expediat linkul de resetare (Token: $token).<br>"
                         . "Link de test: <a href='reset_password.php?token=$token'>Click aici pentru resetare</a>";
            } else {
                $error = "Eroare la generarea token-ului.";
            }
        } else {
            $error = "Nu există cont cu acest email.";
        }
    } else {
        $error = "Vă rugăm să introduceți un email.";
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
      <?php else: ?>
        <form method="POST" action="">
          <input type="email" name="email" placeholder="Introduceți emailul" required>
          <button type="submit">Trimite link resetare</button>
        </form>
      <?php endif; ?>
      
      <div class="login-link">
        <a href="login.php">Înapoi la login</a>
      </div>
    </div>
  </div>
  <script src="../js/particle-init.js"></script>
</body>
</html>
