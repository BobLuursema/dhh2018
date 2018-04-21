<?php






test();

function test($voorletters,$roepnaam,$voorvoegsel,$geboortenaam,$geboortedatum,$geslacht,$meerling,$partnernaam,$voorvoegsel_partnernaam,$telefoon,$mobiel,$email,$woonplaats,$postcode,$toevoeging,$land,$foto,$correspondentie_adres,$huisarts,$tandarts,$apotheek){

   global $db;
   
   $sql = "INSERT INTO patienten(voorletters, roepnaam, voorvoegsel, geboortenaam, geboortedatum, geslacht, meerling, partnernaam, voorvoegsel_partnernaam, telefoon, mobiel, email, woonplaats, postcode, huisnummer, toevoeging, land, foto, patientnummer, correspondentie_adres, huisarts, tandarts, apotheek, toestemming_ophalen_gegevens, akkoord_privacy_policy) VALUES ('$voorletters','$roepnaam','$voorvoegsel','$geboortenaam',$geboortedatum,'$geslacht','$meerling','$partnernaam','$voorvoegsel_partnernaam',$telefoon,$mobiel,'$email','$woonplaats','$postcode',$huisnummer,'$toevoeging','$land','$foto',$patientnummer,'$correspondentie_adres','$huisarts','$tandarts','$apotheek',$toestemming_ophalen_gegevens,$akkoord_privacy_policy)";
    
   $result = $db->query($sql);

   echo "SUcces";


};
    