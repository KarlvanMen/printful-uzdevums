<?php

switch (getGet('r')) {
  case null:
    returnNothing();
    break;
  case 'question':
    getQuestion();
    break;
  case 'answer':
    setAnswer(getPost('data'));
    break;
  default:
    returnNothing();
    break;
}