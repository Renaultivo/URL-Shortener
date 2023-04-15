<?php

$array = explode("/", $_SERVER['REQUEST_URI']);

if ($array[1] != "") {

  // SELECT TARGET FORM URLS WHERE HASH = :hash

  header("Location: https://www.google.com");

}


?>
<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="./assets/css/main.css">
  </head>
  <body>
    <header>
      <img src="./assets/icon/icons8-comprimir-64.png" alt="shortener logo">
      <div class="title">URL Shortener</div>
    </header>
    <div id="shortener">
      <h2>Short your urls</h2>
      <div class="input-box">
        <input type="text" placeholder="https://example.com/123" id="insertedURL">
        <img src="./assets/icon/icons8-enviar-e-mail-64.png" id="sendButton">
      </div>
    </div>
    <script src="./assets/js/main.js"></script>
  </body>
</html>