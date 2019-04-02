<?php

function getFinale() {
  $name = $_SESSION['name'];
  $correct = $_SESSION['correct'];
  $question = $_SESSION['question'] - 1;
  out();
  pj([
    'content' => [  
      'type' => 'finito',
      'name' => $name,
      'correct' => $correct
    ],
    'question' => $question,
    'length' => $question
  ]);
}