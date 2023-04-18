<?php

 include_once("../db/ConnectDB.php");

 $my_DB = new DB();	
 $pdo = $my_DB->pdo;

 $_POST = json_decode(file_get_contents("php://input"), true);


 $hash = $_POST['hash'];

 $sqlSelect = "SELECT TARGET, ACCESS_COUNT from URLS where hash = :hash";

 $cmd = $pdo->prepare($sqlSelect);

 $cmd->bindValue(":hash", $hash);   

 $cmd->execute();

 $result = $cmd->fetchAll(PDO::FETCH_CLASS);

 if(count($result) != 0) {
   echo json_encode(
     array(
       'hash' => $hash,
       'ACCESS_COUNT' => $result[0]->ACCESS_COUNT
     )
 );

 }
 else{
   echo "Hash " . $array[1] . " not found in datebase";
 }
?>