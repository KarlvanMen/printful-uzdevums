<?php

function setAnswer($answer) {
  require_once('./api/objects/product.php');
  if($_SESSION['question'] === 0) {
    $_SESSION['name'] = $answer->name;
    $_SESSION['test'] = $answer->test;
  } else {
    $correct = $tests[$_SESSION['test']][$_SESSION['question']]['correct'];
    if ($correct == $answer ) {
      $_SESSION['correct'] += 1;
    }
  }
  
  $_SESSION['question'] += 1;

  pj([
    'session' => $_SESSION,
    'auth' => isAuth(),
    'answer' => $answer,
    'question' => $_SESSION['question'],
    'length' => count($tests[$_SESSION['test']])
  ]);
}