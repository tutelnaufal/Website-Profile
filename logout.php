<?php
session_start();
session_destroy();
header("Location: portfolio/index.php");
exit();
?>
