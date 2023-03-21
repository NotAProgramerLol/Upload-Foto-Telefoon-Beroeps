

<?php
require_once 'login_check.php';
echo "U bent uiteglogd!<br>";
echo "<a href='../index.php'>OVERZICHT</a>";
session_destroy();

