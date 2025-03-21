function updateDateTime() {
    const now = new Date();
    document.getElementById('datetime').innerText = now.toLocaleString('ro-RO');
}
setInterval(updateDateTime, 1000);
updateDateTime();

function toggleLed(ledId) {
    const ledStatus = document.getElementById(ledId + '-status');
    if (ledStatus.classList.contains('off')) {
        ledStatus.classList.remove('off');
        ledStatus.classList.add('on');
        ledStatus.innconsole.log("global.js loaded");
        let ledStates = {
            led1: false,
            led2: false,
            led3: false,
            bedroom1: false,
            bedroom2: false,
            bedroom3: false,
            kitchen1: false,
            kitchen2: false,
            kitchen3: false,
            living1: false,
            living2: false, 
            living3: false
        };
        
        function loadSavedStates() {
            const savedStates = localStorage.getItem('ledStates');
            if (savedStates) {
                ledStates = JSON.parse(savedStates);
                updateAllLedStates();
            }
        }
        
        function saveStates() {
            localStorage.setItem('ledStates', JSON.stringify(ledStates));
        }
        
        function toggleLed(ledId) {
            ledStates[ledId] = !ledStates[ledId];
            updateLedState(ledId);
            saveStates();
        }
        
        function updateLedState(ledId) {
            const statusElement = document.getElementById(`${ledId}-status`);
            if (statusElement) {
                statusElement.textContent = ledStates[ledId] ? 'Pornit' : 'Oprit';
                statusElement.className = `led-status ${ledStates[ledId] ? 'on' : 'off'}`;
            }
        }
        
        function updateAllLedStates() {
            Object.keys(ledStates).forEach(ledId => {
                updateLedState(ledId);
            });
        }

        function updateDateTime() {
            const now = new Date();
            document.getElementById('datetime').innerText = now.toLocaleString('ro-RO');
        }
        document.addEventListener('DOMContentLoaded', () => {
            loadSavedStates();
            updateDateTime();
            setInterval(updateDateTime, 1000);
          
        });
        
        console.log("global.js unificat (din app.js + global.js) a fost încărcat.");
        erText = "Pornit";
    } else {
        ledStatus.classList.remove('on');
        ledStatus.classList.add('off');
        ledStatus.innerText = "Oprit";
    }
}