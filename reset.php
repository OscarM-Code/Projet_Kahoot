<div id="demo">
      <h2>Ajax</h2>
      <button class="test-btn">Reset</button>
</div>
<?php
error_reporting(0);
ini_set("display_errors", 0);
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), "", 0, "/");
session_regenerate_id(true);
?>
