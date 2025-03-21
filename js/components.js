console.log("components.js loaded");  // Mesaj de debugging pentru a verifica încărcarea fișierului

// Obiectul cu informațiile componentelor
const componentInfo = {
  esp32: {
    title: "ESP32 Board",
    description: "Un microcontroller performant pentru aplicații IoT, cu WiFi și Bluetooth integrate.",
    specs: ["WiFi integrat", "Bluetooth", "Dual-core", "Tensiune de operare: 3.3V"],
    usage: "Utilizat pentru controlul dispozitivelor smart și aplicații IoT."
  },
  bme280: {
    title: "Senzor BME280",
    description: "Măsoară temperatura, umiditatea și presiunea atmosferică.",
    specs: ["Temperatură: -40°C până la 85°C", "Umiditate: 0-100%", "Presiune: 300-1100 hPa"],
    usage: "Ideal pentru monitorizarea condițiilor ambientale."
  },
  relay: {
    title: "Modul Relee 4 Canale",
    description: "Permite controlul a patru dispozitive electrice independent.",
    specs: ["4 canale", "Tensiune de operare: 5V", "Compatibil cu diverse microcontrolere"],
    usage: "Utilizat pentru comutarea aparatelor electrice."
  },
  led: {
    title: "Modul LED RGB",
    description: "Permite controlul luminilor LED cu efecte RGB.",
    specs: ["RGB", "Control individual", "Compatibil cu microcontrolere"],
    usage: "Utilizat pentru a crea efecte luminoase în proiecte."
  },
  sd: {
    title: "Modul Card SD",
    description: "Permite citirea și scrierea datelor pe carduri SD.",
    specs: ["Interfață SPI", "Suport pentru carduri SDHC/SDXC"],
    usage: "Utilizat pentru stocarea datelor în proiecte."
  },
  charger: {
    title: "Modul Încărcare",
    description: "Asigură încărcarea sigură a bateriilor, protejându-le la scurtcircuit și supracurent.",
    specs: ["Protecție la scurtcircuit", "Suportă baterii 18650"],
    usage: "Utilizat pentru a încărca baterii reîncărcabile în proiecte."
  },
  battery: {
    title: "Acumulator",
    description: "Baterie cu drenaj ridicat, ideală pentru dispozitive mobile.",
    specs: ["Capacitate: 3400 mAh", "Curent maxim: până la 20A", "Fără efect de memorie"],
    usage: "Utilizată pentru alimentarea dispozitivelor portabile."
  },
  case: {
    title: "Carcasă",
    description: "Carcasă protejatoare pentru componente electronice.",
    specs: ["Material durabil", "Design modern"],
    usage: "Utilizată pentru protejarea și asamblarea componentelor."
  }
};

function showInfo(component) {
  console.log("Showing info for:", component);  // Debug
  const info = componentInfo[component];
  if (!info) {
    openModal("Informații pentru acest component nu sunt disponibile.");
    return;
  }
  const title = info.title || "Titlu nedefinit";
  const description = info.description || "Descriere indisponibilă";
  const specs = Array.isArray(info.specs) ? info.specs.join('<br>') : "Specificații indisponibile";
  const usage = info.usage || "Utilizare nedefinită";
  
  const infoText = `
    <h2>${title}</h2>
    <p><strong>Descriere:</strong> ${description}</p>
    <p><strong>Specificații:</strong><br>${specs}</p>
    <p><strong>Utilizare:</strong> ${usage}</p>
  `;
  openModal(infoText);
}

function openModal(content) {
  document.getElementById("modalText").innerHTML = content;
  document.getElementById("infoModal").style.display = "block";
}

function closeModal() {
  document.getElementById("infoModal").style.display = "none";
}

// Închide modalul dacă se face click în afara zonei de conținut
window.onclick = function(event) {
  const modal = document.getElementById("infoModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

function updateDateTime() {
  const now = new Date();
  const formatted = now.toISOString().replace('T', ' ').substr(0, 19);
  document.getElementById('datetime').textContent = formatted;
}

updateDateTime();
setInterval(updateDateTime, 1000);
