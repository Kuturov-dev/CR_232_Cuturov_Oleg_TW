function updateEsp32Data() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'data/index-data.php', true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        try {
          const data = JSON.parse(xhr.responseText);
          document.getElementById("esp32-temp").innerText = `${data.temp}°C`;
          document.getElementById("esp32-humidity").innerText = `${data.humidity}%`;
          document.getElementById("esp32-pressure").innerText = `${data.pressure} hPa`;
        } catch (e) {
          console.error("Eroare la parsarea JSON:", e);
        }
      } else {
        console.error("Cererea a eșuat cu statusul:", xhr.status);
      }
    };
    xhr.onerror = function () {
      console.error("Eroare de rețea.");
    };
    xhr.send();
  }
    setInterval(updateEsp32Data, 10000);
  window.addEventListener('DOMContentLoaded', updateEsp32Data);
  