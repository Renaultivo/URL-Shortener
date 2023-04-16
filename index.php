<?php

 include_once("./assets/db/ConnectDB.php");

 $my_DB = new DB();	
 $pdo = $my_DB->pdo;

 $array = explode("/", $_SERVER['REQUEST_URI']);

if ($array[1] != "") {

  // SELECT TARGET FORM URLS WHERE HASH = :hash
  $hash = $array[1];

  $sqlSelect = "select target from URLS where hash = :hash";

  $cmd = $pdo->prepare($sqlSelect);

  $cmd->bindValue(":hash", $hash);   

  $cmd->execute();

  $result = $cmd->fetchAll(PDO::FETCH_CLASS);

  if(count($result) != 0) {

    header("Location: " . $result[0]->target);
 
  }
  else{
    $errorMensage = "Hash " . $array[1] . " not found in datebase";
  }

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
      <?php
        if(isset($errorMensage))
        {
          echo '<h2>' .$errorMensage . '</h2>';
        }
      ?>
      <h2>Short your urls</h2>
      <div class="input-box">
        <input type="text" placeholder="https://example.com/123" id="insertedURL">
        <img src="./assets/icon/icons8-enviar-e-mail-64.png" id="sendButton">
      </div>
    </div>
    <script src="./assets/js/main.js"></script>
  </body>
</html>