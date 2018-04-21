<?php
//============================== PREVENTIE SQL INJECTION ==============================

    //------------ PREPARED STATEMENTS VIA PDO CLASS ------------
        $db = "UMCregistratie";
        $host = "";
        $username = "root";
        $pw = "";

        $conn = mysqli_connect($sn, $us, $pw, $db);

        $preparedStatement = $db->prepare('INSERT INTO table (column) VALUES (:column)');

        $preparedStatement->execute(array('column' => $unsafeValue));
            
        $result = $conn->query($sql)
    
        
