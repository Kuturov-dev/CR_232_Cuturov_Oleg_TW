<?php
header('Content-Type: application/json');

$data = [
  'temp' => round(mt_rand(180, 280) / 10, 1), 
  'darkness' => mt_rand(0, 100),              
  'vent' => ['Normal', 'Slab', 'Puternic'][array_rand(['Normal', 'Slab', 'Puternic'])]
];

echo json_encode($data);
?>
