<?php

include 'common.php';

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    display_page('about');
    break;

if (isset($_GET['logout'])) {
    session_destroy();
}
}
