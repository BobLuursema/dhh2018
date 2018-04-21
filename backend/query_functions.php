<?php

//============================== PREVENTIE SQL INJECTION ==============================

    //------------ PREPARED STATEMENTS VIA PDO CLASS ------------
    
    function createPatient($voorletters,$roepnaam,$voorvoegsel,$geboortenaam,$geboortedatum,$geslacht,$meerling,$partnernaam,$voorvoegsel_partnernaam,$telefoon,$mobiel,$email,$woonplaats,$postcode,$toevoeging,$land,$foto,$correspondentie_adres,$huisarts,$tandarts,$apotheek){
        
            
        
        global $db;
                
        $preparedStatement = $db->prepare('INSERT INTO patienten(voorletters, roepnaam, voorvoegsel, geboortenaam, geboortedatum, geslacht, meerling, partnernaam, voorvoegsel_partnernaam, telefoon, mobiel, email, woonplaats, postcode, huisnummer, toevoeging, land, foto, patientnummer, correspondentie_adres, huisarts, tandarts, apotheek, toestemming_ophalen_gegevens, akkoord_privacy_policy) VALUES (:voorletters,:roepnaam,:voorvoegsel,:geboortenaam,'.$geboortedatum.',:geslacht,:meerling,:partnernaam,:voorvoegsel_partnernaam,:telefoon,:mobiel,:email,:woonplaats,:postcode,'.$huisnummer.',:toevoeging,:land,:foto,'.patientnummer.',:correspondentie_adres,:huisarts,:tandarts,:apotheek,'.$toestemming_ophalen_gegevens.','.$akkoord_privacy_policy.')');

        $preparedStatement->execute(array('voorletters' => $voorletters, 'roepnaam' => $roepnaam, 'voorvoegsel'=> $voorvoegsel, 'geboortenaam'=>$geboortenaam,'geboortedatum'=>$geboortedatum,'geslacht'=> $geslacht,'meerling'=> $meerling, 'partnernaam'=> $partnernaam,'voorvoegsel_partnernaam'=>$voorvoegsel_partnernaam,'telefoon'=>$telefoon,'mobiel'=>$mobiel,'email'=>$email,'woonplaats'=>$woonplaats,'postcode'=>$postcode,'toevoeging'=>$toevoeging,'land'=>$land,'foto'=>$foto,'correspondentie_adres'=>$correspondentie_adres,'huisarts'=>$huisarts,'tandarts'=>$tandarts,'apotheek'=>$apotheek));

        $red = $preparedStatement->fetchAll();
        
    };