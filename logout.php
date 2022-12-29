<?php

require_once("../src/config/config.php");

session_destroy();
session_unset();
unset($_SESSION);

header("Location: ../index.php");
exit;