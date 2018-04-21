<?php

require_once('../initialize.php');
$confirmed = true;

if(isset($_POST['data'])){
  header("Content-type: application/json; charset=UTF-8");
  $obj = json_decode($_POST['data'],false);

  $required = [$obj->voorletters,$obj->roepnaam,$obj->geboortenaam,$obj->geboortedatum, $obj->geslacht,$obj->meerling,$obj->mobiel,$obj->email,$obj->woonplaats,$obj->postcode,$obj->huisnummer,$obj->land,$obj->toestemming_ophalen_gegevens,$obj->akkoord_privacy_policy];

  foreach ($required as $field) {
    if(!isset($field)){
      echo "Please fill out all required fields";
      $confirmed = false;
    }
  }

  if($confirmed == true){
    create_patient($obj);
  }
}

 ?>
