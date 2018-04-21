<?php
//============================== PREVENTIE SQL INJECTION ==============================

    //------------ PREPARED STATEMENTS VIA PDO CLASS ------------
        $db = UMCregistratie;

        $preparedStatement = $db->prepare('INSERT INTO table (column) VALUES (:column)');

        $preparedStatement->execute(array('column' => $unsafeValue));
    
        
