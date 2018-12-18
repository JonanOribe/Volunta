<?php

function runMyFunction() {
    echo 'I just ran a php function';
  }
 
  if (isset($_GET['hello'])) {
    runMyFunction();
  }

?>