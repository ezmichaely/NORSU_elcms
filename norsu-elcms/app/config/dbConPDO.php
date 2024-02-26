<?php
    date_default_timezone_set('Asia/Manila');
    session_start();

    include_once (ROOT_PATH . '/app/config/dbVariables.php');
    include_once (ROOT_PATH . '/app/helpers/function.php');

    $dsn = "mysql:host=$dbServername;dbname=$dbName;charset=$charset;port=$port";
    
    try {
        $pdo = new \PDO($dsn, $dbUsername, $dbPassword, $options);
        
        if ($pdo) {
            //echo "Connected to the $dbName database successfully!";
            
        }
    } catch (\PDOException $e) {
        
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
?>
