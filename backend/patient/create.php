<?php

require_once('../initialize.php');
$confirmed = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  header("Content-type: application/json; charset=UTF-8");
  $request_body = file_get_contents('php://input');
  $obj = json_decode($request_body);

  echo "Patient ontvangen in de backend: " . $obj->roepnaam;

  $required = [$obj->voorletters,$obj->roepnaam,$obj->geboortenaam,$obj->geboortedatum, $obj->geslacht,$obj->meerling,$obj->mobiel,$obj->email,$obj->woonplaats,$obj->postcode,$obj->huisnummer,$obj->land,$obj->toestemming_ophalen_gegevens,$obj->akkoord_privacy_policy];

  foreach ($required as $field) {
    if(!isset($field) || empty($field)){
      echo "Please fill out all required fields";
      $confirmed = false;
    }
  }

  $patient = getPatient($obj);

  if(mysqli_num_rows($patient) > 0){
    echo "Patient staat al in het systeem.";
    $confirmed = false;
  }

  if($confirmed == true){
    createPatient($obj);
  }
}

 ?>