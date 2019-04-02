<?php
session_start();

if (file_exists('./config/init.php')) {
  require('./config/init.php');
}else{
  echo '{"error":"No init file"}';
}
if (file_exists('./route.php')) {
  require('./route.php');
}else{
  echo '{"error":"No route file"}';
}
pj(['error' => "Sth wrong" ]);

