<?php

  require_once('./initialize.php');

    function createPatient($obj){

        //$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME)
        global $db;
        $mysqli = new $db;
        
        

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


        $stmt = $mysqli->prepare('INSERT INTO patienten(voorletters, roepnaam, voorvoegsel, geboortenaam, geboortedatum, geslacht, meerling, partnernaam, voorvoegsel_partnernaam, telefoon, mobiel, email, woonplaats, postcode, huisnummer, toevoeging, land, foto, patientnummer, correspondentie_adres, huisarts, tandarts, apotheek, toestemming_ophalen_gegevens, akkoord_privacy_policy) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        $stmt->bind_param('ssssssssssssssisssissssii', $voorletters, $roepnaam, $voorvoegsel, $geboortenaam,$geboortedatum,$geslacht,$meerling,$partnernaam,$voorvoegsel_partnernaam,$telefoon,$mobiel,$email,$woonplaats,$postcode,$huisnummer,$toevoeging,$land,$foto,$patientnummer,$correspondentie_adres,$huisarts,$tandarts,$apotheek,$toestemming_ophalen_gegevens,$akkoord_privacy_policy);
        
        $stmt->execute();

    };
