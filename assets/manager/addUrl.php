<?php
    include_once("../db/ConnectDB.php");
    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

    $hash_symbols = array(
        'a', 'b', 'c', 'd', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'w', 'y', 'z',
        '',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
    );

    function createHash() {

        global $hash_symbols;
    
        $hash = '';
    
        for ($i=0; $i<10; $i++) {
            $hash = $hash.$hash_symbols[rand(0, count($hash_symbols)-1)];
        }
    
        return $hash;
    
    }


    $url = $_POST['url'];

    $array = explode("/", $_SERVER[$url]);

    $target = $_POST['url'];     
	$hash  = createHash();

 
    $sqlSelect = "select * from URLS where target = :target OR hash = :hash";
    $cmd = $pdo->prepare($sqlSelect);

    $cmd->bindValue(":target", $target);         
	$cmd->bindValue(":hash", $hash); 

    $cmd->execute();


    if(is_null($cmd->fetchAll(PDO::FETCH_CLASS)))
    {

        $sql = "insert into URLS (target,hash) values (:target, :hash)";

        $cmd = $pdo->prepare($sql);
                                   
        if($cmd->execute())
        {
            echo json_encode(array(
                'result' => 201
            ));
        }
        else
        {
            echo json_encode(array(
                'result' => 400
            ));
        }
    }
?>