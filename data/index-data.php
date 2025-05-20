<?php
header('Content-Type: application/json');
$data = [
  'temp' => round(mt_rand(180, 380) / 10, 1),
  'humidity' => mt_rand(30, 70),
  'pressure' => mt_rand(1000, 1080)
];
echo json_encode($data);
?>
