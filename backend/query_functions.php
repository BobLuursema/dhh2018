<?php
//============================== PREVENTIE SQL INJECTION ==============================

    //------------ PREPARED STATEMENTS VIA PDO CLASS ------------

    function createPatient($obj){
        
        global $db;
        
        $voorletters = $obj->voorletters;
        $roepnaam = $obj->roepnaam;
        $voorvoegsel = $obj->voorvoegsel;
        $geboortenaam = $obj->geboortenaam;
        $geboortedatum = $obj->geboortedatum;
        $geslacht = $obj->geslacht;
        $meerling  = $obj->meerling;
        $partnernaam = $obj->partnernaam;
        $voorvoegsel_partnernaam = $obj->voorvoegsel_partnernaam;
        $telefoon = $obj->telefoon;
        $mobiel = $obj->mobiel;
        $email = $obj->email;
        $woonplaats = $obj->woonplaats;
        $postcode = $obj->postcode;
        $toevoeging = $obj->toevoeging;
        $land = $obj->land;
        $foto = $obj->foto;
        $correspondentie_adres = $obj->correspondentie_adres;
        $huisarts = $obj->huisarts;
        $tandarts = $obj->tandarts;
        $apotheek = $obj->apotheek;
        $huisnummer = $obj->huisnummer;
        $patientnummer = $obj->patientnummer;
        $toestemming_ophalen_gegevens = $obj->toestemming_ophalen_gegevens;
        $akkoord_privacy_policy = $obj->akkoord_privacy_policy;
                

        $preparedStatement = $db->prepare('INSERT INTO patienten(voorletters, roepnaam, voorvoegsel, geboortenaam, geboortedatum, geslacht, meerling, partnernaam, voorvoegsel_partnernaam, telefoon, mobiel, email, woonplaats, postcode, huisnummer, toevoeging, land, foto, patientnummer, correspondentie_adres, huisarts, tandarts, apotheek, toestemming_ophalen_gegevens, akkoord_privacy_policy) VALUES (:voorletters,:roepnaam,:voorvoegsel,:geboortenaam,'.$geboortedatum.',:geslacht,:meerling,:partnernaam,:voorvoegsel_partnernaam,:telefoon,:mobiel,:email,:woonplaats,:postcode,'.$huisnummer.',:toevoeging,:land,:foto,'.$patientnummer.',:correspondentie_adres,:huisarts,:tandarts,:apotheek,'.$toestemming_ophalen_gegevens.','.$akkoord_privacy_policy.')');

        $preparedStatement->execute(array('voorletters' => $voorletters, 'roepnaam' => $roepnaam, 'voorvoegsel'=> $voorvoegsel, 'geboortenaam'=>$geboortenaam,'geboortedatum'=>$geboortedatum,'geslacht'=> $geslacht,'meerling'=> $meerling, 'partnernaam'=> $partnernaam,'voorvoegsel_partnernaam'=>$voorvoegsel_partnernaam,'telefoon'=>$telefoon,'mobiel'=>$mobiel,'email'=>$email,'woonplaats'=>$woonplaats,'postcode'=>$postcode,'toevoeging'=>$toevoeging,'land'=>$land,'foto'=>$foto,'correspondentie_adres'=>$correspondentie_adres,'huisarts'=>$huisarts,'tandarts'=>$tandarts,'apotheek'=>$apotheek));

        $red = $preparedStatement->fetchAll();
               
    };

 ?>
