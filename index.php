<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: logare/login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Home Control</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <div id="particles-js"></div>
  <div class="container">
    <header>
      <div class="header-content">
        <h1><i class="fas fa-home"></i> Demo Smart Home Control</h1>
        <div class="user-info">
          <i class="fas fa-user"></i>
          <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
          <a href="logare/logout.php" style="color: #f44336; margin-left: 10px;">Logout</a>
        </div>
      </div>
      <div class="datetime-container">
        <i class="fas fa-clock"></i>
        <div id="datetime" class="datetime">2025-02-21 01:27:33</div>
      </div>
    </header>
    <main>
      <section class="sensor-card">
        <div class="card">
          <h2><i class="fas fa-microchip"></i> ESP32 Senzori</h2>
          <div class="sensor-grid">
            <div class="sensor-item">
              <i class="fas fa-temperature-high"></i>
              <span class="sensor-label">Temperatură</span>
              <span id="esp32-temp" class="sensor-value">21.5°C</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-tint"></i>
              <span class="sensor-label">Umiditate</span>
              <span id="esp32-humidity" class="sensor-value">45%</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-compress-alt"></i>
              <span class="sensor-label">Presiune</span>
              <span id="esp32-pressure" class="sensor-value">1013 hPa</span>
            </div>
          </div>
        </div>
      </section>
      <section class="led-card">
        <div class="card">
          <h2><i class="fas fa-lightbulb"></i> Control LED-uri</h2>
          <div class="led-grid">
            <div class="led-group" data-led="led1">
              <button class="led-button" onclick="toggleLed('led1')">
                <i class="fas fa-power-off"></i>
                <span>Lumina Intrare</span>
              </button>
              <div class="led-status off" id="led1-status">Oprit</div>
            </div>
            <div class="led-group" data-led="led2">
              <button class="led-button" onclick="toggleLed('led2')">
                <i class="fas fa-power-off"></i>
                <span>Lumina Baie</span>
              </button>
              <div class="led-status off" id="led2-status">Oprit</div>
            </div>
            <div class="led-group" data-led="led3">
              <button class="led-button" onclick="toggleLed('led3')">
                <i class="fas fa-power-off"></i>
                <span>Priza Fierbator</span>
              </button>
              <div class="led-status off" id="led3-status">Oprit</div>
            </div>
          </div>
        </div>
      </section>
      <section class="navigation-card">
        <div class="card">
          <h2><i class="fas fa-link"></i> Navigare</h2>
          <div class="navigation-grid">
            <a href="bedroom.php" class="nav-button">
              <i class="fas fa-bed"></i> Dormitor
            </a>
            <a href="livingroom.php" class="nav-button">
              <i class="fas fa-couch"></i> Living
            </a>
            <a href="kitchen.php" class="nav-button">
              <i class="fas fa-kitchen-set"></i> Bucătărie
            </a>
            <a href="components.php" class="nav-button">
              <i class="fas fa-microchip"></i> Componente
            </a>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="footer-content">
        <p>&copy; 2025 By <span class="highlight">Kuturov</span></p>
      </div>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="js/particle-init.js"></script>
  <script src="js/global.js"></script>
</body>
</html>
