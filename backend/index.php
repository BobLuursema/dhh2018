<?php

require_once('initialize.php');


test();

function test($obj){

   global $db;

   $sql = "INSERT INTO patienten(voorletters, roepnaam, voorvoegsel, geboortenaam, geboortedatum, geslacht, meerling, partnernaam, voorvoegsel_partnernaam, telefoon, mobiel, email, woonplaats, postcode, huisnummer, toevoeging, land, foto, patientnummer, correspondentie_adres, huisarts, tandarts, apotheek, toestemming_ophalen_gegevens, akkoord_privacy_policy) VALUES ('$obj->voorletters','$obj->roepnaam','$obj->voorvoegsel','$obj->geboortenaam',$obj->geboortedatum,'$obj->geslacht','$obj->meerling','$obj->partnernaam','$obj->voorvoegsel_partnernaam',$obj->telefoon,$obj->mobiel,'$obj->email','$obj->woonplaats','$obj->postcode',$obj->huisnummer,'$obj->toevoeging','$obj->land','$obj->foto',$obj->patientnummer,'$obj->correspondentie_adres','$obj->huisarts','$obj->tandarts','$obj->apotheek',$obj->toestemming_ophalen_gegevens,$obj->akkoord_privacy_policy)";

   $result = $db->query($sql);

   echo "SUcces";


};
