<?php

require_once('../initialize.php');
$confirmed = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  header("Content-type: application/json; charset=UTF-8");
  $obj = json_decode($_POST['data'],false);

  echo "Patient ontvangen in de backend: " . $obj->roepnaam;

  $required = [$obj->voorletters,$obj->roepnaam,$obj->geboortenaam,$obj->geboortedatum, $obj->geslacht,$obj->meerling,$obj->mobiel,$obj->email,$obj->woonplaats,$obj->postcode,$obj->huisnummer,$obj->land,$obj->toestemming_ophalen_gegevens,$obj->akkoord_privacy_policy];

  foreach ($required as $field) {
    if(!isset($field)){
      echo "Please fill out all required fields";
      $confirmed = false;
    }
  }

  $patient = getPatient($obj);

  if($patient->num_rows() > 0){
    echo "Patient staat al in het systeem.";
  }

  if($confirmed == true){
    createPatient($obj);
    echo "Patient aangemaakt";
  }
}

 ?>
