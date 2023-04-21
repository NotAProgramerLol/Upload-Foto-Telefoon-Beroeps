

<?php
require_once 'login_check.php';
echo "U bent uiteglogd!<br>";
echo "<a href=' index.php'>OVERZICHT</a>";
session_destroy();
header('Location: https://87957.stu.sd-lab.nl/Upload-Foto-Telefoon-Beroeps/backend/login.php');

