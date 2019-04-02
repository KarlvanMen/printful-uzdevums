<?php

function isAuth() {
  if (isset($_SESSION['is_auth'])) {
      return $_SESSION['is_auth'];
  }
  return false;
}
function auth() {
  $_SESSION['is_auth'] = true;
  $_SESSION['question'] = 0;
  $_SESSION['correct'] = 0;
}
function out() {
  $_SESSION = [];
  session_destroy();
}
function test() {
  pj($_SESSION);
}