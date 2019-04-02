<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sample</title>
</head>
<body>
  <h1>Hello!</h1>
  <?php
  error_reporting( E_ALL );
  ini_set('display_errors', 1);
  include './config/init.php';
  // auth();
  // print_r(test());
  require_once('./api/product/read.php');
  getInitScreen();
  ?>
  
</body>
</html>