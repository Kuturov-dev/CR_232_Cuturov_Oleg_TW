<?php
header('Content-Type: application/json');
session_start();
if (!isset($_SESSION['user_id'])) {
  http_response_code(401);
  echo json_encode(['error' => 'Unauthorized']);
  exit;
}
$data = [
  'temp' => rand(200, 280) / 10,
  'gas' => rand(0, 10) > 8 ? "1" : "0", 
  'smoke' => rand(0, 10) > 9 ? "1" : "0" 
];

echo json_encode($data);
?>