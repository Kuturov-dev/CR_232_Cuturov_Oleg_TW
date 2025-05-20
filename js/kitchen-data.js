function fetchKitchenData() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/kitchen-data.php', true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        const data = JSON.parse(xhr.responseText);

        document.getElementById("kitchen-temp").innerText = `${data.temp}°C`;
        document.getElementById("kitchen-gas").innerText = data.gas === "1" ? "Detectat" : "Normal";
        document.getElementById("kitchen-smoke").innerText = data.smoke === "1" ? "Detectat" : "Normal";

      } catch (e) {
        console.error("Eroare la parsarea JSON-ului:", e);
      }
    } else {
      console.error("Cererea a eșuat cu statusul:", xhr.status);
    }
  };
  xhr.onerror = function () {
    console.error("Eroare de rețea la kitchen-data.");
  };
  xhr.send();
}

setInterval(fetchKitchenData, 10000);
window.addEventListener('DOMContentLoaded', fetchKitchenData);
