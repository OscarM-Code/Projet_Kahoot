<?php
error_reporting(0);
ini_set("display_errors", 0);
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), "", 0, "/");
session_regenerate_id(true);
?>
