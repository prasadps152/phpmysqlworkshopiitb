<?php
  session_start();
  session_destroy();
  echo "You're logged out. <a href='index.html'> Go back to portal </a>"
?>
