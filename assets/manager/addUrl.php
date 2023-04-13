<?php
    include_once("../db/connectDB.php");
    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

    $hashsymbols = array(
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


	$sql = "insert into url_shortene (target,hash) values (:target, :hash)";

	$cmd = $pdo->prepare($sql);
                  
	$target = $_POST['url'];     
	$hash  = createHash();

                   
	$cmd->bindValue(":target"   , $target);         
	$cmd->bindValue(":hash"    , $hash); 

	$cmd->execute();
?>