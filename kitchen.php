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
  <title>Smart Home - Kitchen</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/kitchen.css">
</head>
<body>
  <div id="particles-js"></div>
  <div class="container">
    <header>
      <div class="header-content">
        <h1><i class="fas fa-kitchen-set"></i> Kitchen Control</h1>
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
          <h2><i class="fas fa-microchip"></i> Senzori Bucătărie</h2>
          <div class="sensor-grid">
            <div class="sensor-item">
              <i class="fas fa-temperature-high"></i>
              <span class="sensor-label">Temperatură</span>
              <span id="kitchen-temp" class="sensor-value">23.8°C</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-fire"></i>
              <span class="sensor-label">Detector Gaz</span>
              <span id="kitchen-gas" class="sensor-value">Normal</span>
            </div>
            <div class="sensor-item">
              <i class="fas fa-smoke"></i>
              <span class="sensor-label">Detector Fum</span>
              <span id="kitchen-smoke" class="sensor-value">Normal</span>
            </div>
          </div>
        </div>
      </section>

      <section class="led-card">
        <div class="card">
          <h2><i class="fas fa-plug"></i> Control Aparate</h2>
          <div class="led-grid">
            <div class="led-group" data-led="kitchen1">
              <button class="led-button" onclick="toggleLed('kitchen1')">
                <i class="fas fa-lightbulb"></i>
                <span>Lumină Principală</span>
              </button>
              <div class="led-status off" id="kitchen1-status">Oprit</div>
            </div>
            <div class="led-group" data-led="kitchen2">
              <button class="led-button" onclick="toggleLed('kitchen2')">
                <i class="fas fa-coffee"></i>
                <span>Cafetieră</span>
              </button>
              <div class="led-status off" id="kitchen2-status">Oprit</div>
            </div>
            <div class="led-group" data-led="kitchen3">
              <button class="led-button" onclick="toggleLed('kitchen3')">
                <i class="fas fa-blender"></i>
                <span>Robot Bucătărie</span>
              </button>
              <div class="led-status off" id="kitchen3-status">Oprit</div>
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
            <a href="livingroom.php" class="nav-button">
              <i class="fas fa-couch"></i> Living
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
