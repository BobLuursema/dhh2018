<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => str_replace("X_N", $_GET['number'], str_replace("X_P", $_GET['postcode'], "https://api.postcodeapi.nu/v2/addresses/?postcode=X_PK&number=X_N")),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array (
                "cache-control: no-cache",
                "X-Api-Key: JEypHWWhFR5a5CJWRQ0uX2kvVU2Bsy6Y6oMz4svO"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        echo $response;

        curl_close($curl);
    }