<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost:8080");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// MAIN OUTPUT WRAPPER
function pj($message) {
  print json_encode($message, JSON_PRETTY_PRINT);
  exit;
}

if (file_exists('./config/functions.php')) {
  require_once('./config/functions.php');
}else{
  pj(['error' => "No functions file"]);
}

if (file_exists('./config/errors.php')) {
  require_once('./config/errors.php');
}else{
  pj(['error' => "No errors file"]);
}

if (file_exists('./config/auth.php')) {
  require_once('./config/auth.php');
}else{
  pj(['error' => "No authors file"]);
}

if (file_exists('./api/product/read.php')) {
  require_once('./api/product/read.php');
}else{
  pj(['error' => "No read file"]);
}

if (file_exists('./api/product/write.php')) {
  require_once('./api/product/write.php');
}else{
  pj(['error' => "No write file"]);
}

if (file_exists('./api/product/calculate_results.php')) {
  require_once('./api/product/calculate_results.php');
}else{
  pj(['error' => "No calculate_results file"]);
}

?>