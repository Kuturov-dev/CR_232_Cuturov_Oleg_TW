function fetchBedroomData() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'data/bedroom-data.php', true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        try {
          const data = JSON.parse(xhr.responseText);
          document.getElementById("bedroom-temp").innerText = `${data.temp}°C`;
          document.getElementById("bedroom-darkness").innerText = `${data.darkness}%`;
          document.getElementById("bedroom-vent").innerText = data.vent;
        } catch (e) {
          console.error("Eroare la parsarea JSON-ului:", e);
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
    setInterval(fetchBedroomData, 10000);
    window.addEventListener('DOMContentLoaded', fetchBedroomData);