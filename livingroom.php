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
  <title>Smart Home - Living</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/livingroom.css">
</head>
<body>
  <div id="particles-js"></div>
  <div class="container">
    <header>
      <div class="header-content">
        <h1><i class="fas fa-couch"></i> Living Room Control</h1>
        <div class="user-info">
          <i class="fas fa-user"></i>
          <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
          <a href="logare/logout.php" style="color: #f44336; margin-left: 10px;">Logout</a>
        </div>
      </div>
      <div class="datetime-container">
        <i class="fas fa-clock"></i>
        <div id="datetime" class="datetime"></div>
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
              <span id="living-temp" class="sensor-value">22.5°C</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-sun"></i>
              <span class="sensor-label">Luminozitate</span>
              <span id="living-light" class="sensor-value">75%</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-wind"></i>
              <span class="sensor-label">Calitate Aer</span>
              <span id="living-air" class="sensor-value">Bună</span>
            </div>
          </div>
        </div>
      </section>

      <section class="led-card">
        <div class="card">
          <h2><i class="fas fa-lightbulb"></i> Control Dispozitive</h2>
          <div class="led-grid">
            <div class="led-group" data-led="living1">
              <button class="led-button" onclick="toggleLed('living1')">
                <i class="fas fa-tv"></i>
                <span>Smart TV</span>
              </button>
              <div class="led-status off" id="living1-status">Oprit</div>
            </div>
            <div class="led-group" data-led="living2">
              <button class="led-button" onclick="toggleLed('living2')">
                <i class="fas fa-lightbulb"></i>
                <span>Lumini Ambientale</span>
              </button>
              <div class="led-status off" id="living2-status">Oprit</div>
            </div>
            <div class="led-group" data-led="living3">
              <button class="led-button" onclick="toggleLed('living3')">
                <i class="fas fa-fan"></i>
                <span>Ventilator</span>
              </button>
              <div class="led-status off" id="living3-status">Oprit</div>
            </div>
          </div>
        </div>
      </section>

      <section class="navigation-card">
        <div class="card">
          <h2><i class="fas fa-link"></i> Navigare</h2>
          <div class="navigation-grid">
            <a href="index.php" class="nav-button">
              <i class="fas fa-home"></i> Acasă
            </a>
            <a href="kitchen.php" class="nav-button">
              <i class="fas fa-kitchen-set"></i> Bucătărie
            </a>
            <a href="bedroom.php" class="nav-button">
              <i class="fas fa-bed"></i> Dormitor
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
  
  <div id="infoModal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="closeModal()">&times;</span>
      <div id="modalText"></div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="js/particle-init.js"></script>
  <script src="js/global.js"></script>
</body>
</html>
