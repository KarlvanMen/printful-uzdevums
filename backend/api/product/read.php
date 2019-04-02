<?php

function getQuestion() {
  require_once('./api/objects/product.php');
  if (isAuth()) {
    if ($_SESSION['question'] === 0) {
      auth();
      pj([
        'content' => $start[0]
      ]);
    } else {
      if ($_SESSION['question'] > (count($tests[$_SESSION['test']]))) {
        getFinale();
      } else {
        pj([
          'content' => $tests[$_SESSION['test']][$_SESSION['question']],
          'question' => $_SESSION['question'] - 1,
          'length' => count($tests[$_SESSION['test']])
        ]);
      }
    }
  } else {
    auth();
    pj([
      'content' => $start[0]
    ]);
  }
}