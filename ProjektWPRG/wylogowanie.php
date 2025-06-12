<?php
require_once 'sesja.php';

session_destroy();
setcookie('ostatni_login', '', time() - 3600);

header("Location: logowanie.php");
exit;
