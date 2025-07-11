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
  <title>Smart Home - Componente</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/components.css">
</head>
<body>
  <div id="particles-js"></div>
  <div class="container">
    <header>
      <div class="header-content">
        <h1><i class="fas fa-microchip"></i> Componente Smart Home</h1>
        <div class="user-info">
          <i class="fas fa-user"></i>
          <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
          <a href="logare/logout.php" style="color: #f44336; margin-left: 10px;">Logout</a>
        </div>
      </div>
      <div class="datetime-container">
        <i class="fas fa-clock"></i>
        <div id="datetime" class="datetime">2025-02-21 00:24:53</div>
      </div>
    </header>

    <main>
      <div class="component-grid">
        <div class="component-card">
          <h2><i class="fas fa-microchip"></i> ESP32 Board</h2>
          <div class="component-image-container">
            <img src="images/components/esp32.jpg" alt="ESP32" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/1005004605399313.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără ESP32
          </a>
          <button class="btn-info" onclick="showInfo('esp32')">
            <i class="fas fa-info-circle"></i> Informații ESP32
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-thermometer-half"></i> Senzor BME280</h2>
          <div class="component-image-container">
            <img src="images/components/bme280.jpg" alt="BME280" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/32849462236.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără BME280
          </a>
          <button class="btn-info" onclick="showInfo('bme280')">
            <i class="fas fa-info-circle"></i> Informații BME280
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-plug"></i> Modul Relee 4 Canale</h2>
          <div class="component-image-container">
            <img src="images/components/relay.jpg" alt="Relay" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/1005001903120199.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Modul Rele
          </a>
          <button class="btn-info" onclick="showInfo('relay')">
            <i class="fas fa-info-circle"></i> Informații Modul Rele
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-lightbulb"></i> Modul LED RGB</h2>
          <div class="component-image-container">
            <img src="images/components/led.jpg" alt="LED" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/1005002328875763.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Modul LED
          </a>
          <button class="btn-info" onclick="showInfo('led')">
            <i class="fas fa-info-circle"></i> Informații Modul LED
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-sd-card"></i> Modul Card SD</h2>
          <div class="component-image-container">
            <img src="images/components/sd-module.jpg" alt="SD Module" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/1005008271633750.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Modul SD
          </a>
          <button class="btn-info" onclick="showInfo('sd')">
            <i class="fas fa-info-circle"></i> Informații Modul SD
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-battery-three-quarters"></i> Modul Încărcare</h2>
          <div class="component-image-container">
            <img src="images/components/charger.jpg" alt="Charging Module" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/4001203626107.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Modul Încărcare
          </a>
          <button class="btn-info" onclick="showInfo('charger')">
            <i class="fas fa-info-circle"></i> Informații Modul Încărcare
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-battery-full"></i> Acumulator</h2>
          <div class="component-image-container">
            <img src="images/components/battery.jpg" alt="Battery" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/32807032859.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Acumulator
          </a>
          <button class="btn-info" onclick="showInfo('battery')">
            <i class="fas fa-info-circle"></i> Informații Acumulator
          </button>
        </div>

        <div class="component-card">
          <h2><i class="fas fa-box"></i> Carcasă</h2>
          <div class="component-image-container">
            <img src="images/components/case.jpg" alt="Case" class="component-image">
          </div>
          <a href="https://aliexpress.ru/item/1005002656761229.html" target="_blank" class="shop-link">
            <i class="fas fa-shopping-cart"></i> Cumpără Carcasă
          </a>
          <button class="btn-info" onclick="showInfo('case')">
            <i class="fas fa-info-circle"></i> Informații Carcasă
          </button>
        </div>
      </div>
    </main>

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
  <script src="js/components.js"></script>
</body>
</html>
