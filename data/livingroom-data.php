<?php
header('Content-Type: application/json');
session_start();

// Verifică dacă utilizatorul este autentificat
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['error' => 'Unauthorized']);
  exit;
}

// Aici ar veni logica pentru citirea valorilor reale ale senzorilor
// Pentru exemplu, folosim valori aleatorii
$data = [
  'temp' => rand(210, 260) / 10, // Temperatură între 21.0 și 26.0
  'light' => rand(20, 95),       // Luminozitate între 20% și 95%
  'air' => rand(30, 170)         // Valoare calitate aer (mai mică e mai bună)
];

echo json_encode($data);
?>