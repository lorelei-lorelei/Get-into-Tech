<?php
include 'common.php';

if(isset($_GET['logout'])) {
  session_destroy();
  display_page('logout_confirm');

  exit();
}

function perform_login($user)
{

    if (empty($user) || !password_verify($_POST['password'], $user['password'])) {
        throw new Exception('Sorry, your login credentials are not found.');
    }

    $_SESSION[USER_SESSION] = $user;
    display_page('login_confirm');
    exit();
}

$sql = "SELECT * FROM users WHERE username = :username";

switch($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    display_page('login');
    break;

  case 'POST':
    $stmt = $gPDO->prepare($sql);
    $stmt->execute(['username' => $_POST['username']]);

  perform_login($stmt->fetch());
  display_page('login_confirm');
    break;
}
