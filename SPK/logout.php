<?php

error_reporting(0);
session_start();
require_once 'config.php';

/* proses logout */

session_destroy();
exit("<script>window.location='".$wwwroot."';</script>");

?>