<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "norsu-elcms";
    $port = "3306";
    $charset = 'utf8mb4';

    // $dbServername = "sql112.epizy.com";
    // $dbUsername = "epiz_30519062";
    // $dbPassword = "xwAYmK2MRISWdCp";
    // $dbName = "epiz_30519062_norsuelcms";
    // $port = "3306";
    // $charset = 'utf8mb4';

    $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
?>
