function fetchLivingData() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/livingroom-data.php', true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        const data = JSON.parse(xhr.responseText);

        document.getElementById("living-temp").innerText = `${data.temp}°C`;
        document.getElementById("living-light").innerText = `${data.light}%`;
        
        // Determinăm calitatea aerului în funcție de valoarea primită
        let airQuality = "Bună";
        if (data.air < 50) {
          airQuality = "Excelentă";
        } else if (data.air >= 50 && data.air < 100) {
          airQuality = "Bună";
        } else if (data.air >= 100 && data.air < 150) {
          airQuality = "Moderată";
        } else if (data.air >= 150) {
          airQuality = "Slabă";
        }
        
        document.getElementById("living-air").innerText = airQuality;

      } catch (e) {
        console.error("Eroare la parsarea JSON-ului:", e);
      }
    } else {
      console.error("Cererea a eșuat cu statusul:", xhr.status);
    }
  };
  xhr.onerror = function () {
    console.error("Eroare de rețea la living-data.");
  };
  xhr.send();
}

// Actualizează data și ora curentă
function updateDateTime() {
  const now = new Date();
  const formattedDateTime = now.toISOString().slice(0, 19).replace('T', ' ');
  document.getElementById('datetime').innerText = formattedDateTime;
}

// Apelăm funcțiile la încărcarea paginii
window.addEventListener('DOMContentLoaded', function() {
  fetchLivingData();
  updateDateTime();
  
  // Actualizăm datele și ora la fiecare 10 secunde
  setInterval(fetchLivingData, 10000);
  setInterval(updateDateTime, 1000);
});