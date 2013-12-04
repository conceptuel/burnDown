<?php
 
    $xml = file_get_contents('demo.xml');

    // Call external service  
    $curl_connection = curl_init("http://www.conceptuel.co.uk/burnDown/burnDown.php");
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt( $curl_connection, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
    
    curl_setopt($curl_connection, CURLOPT_POST, true);
    curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $xml);
    
    $htmlResponse = curl_exec($curl_connection);
    
    if ($htmlResponse) {
        // Do something with the response from the service
        // This will include the html that will generate the graph
        // An example can be seen at http://www.conceptuel.co.uk/burnDown/demo.html
        file_put_contents('demo.html',$htmlResponse);
    }
    else {
        // Do something else
    }
    
?>    