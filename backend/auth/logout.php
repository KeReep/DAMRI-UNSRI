<?php
session_start();

$_SESSION = [];
session_destroy();

header('Location: ../../public/frontend/login_page.php');
exit;