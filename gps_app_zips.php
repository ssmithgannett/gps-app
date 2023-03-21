<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$curl = curl_init();

if ( isset($_GET['selections']) ){
  $selections = $_GET['selections'];
  $sanitize = array("ALTER TABLE", "BETWEEN", "CREATE DATABASE", "CREATE TABLE", "CREATE INDEX", "CREATE VIEW", "DELETE", "DROP DATABASE", "DROP INDEX", "DROP TABLE", "EXISTS", "GROUP BY", "HAVING", "INSERT INTO", "INNER JOIN", "LEFT JOIN", "RIGHT JOIN", "FULL JOIN", "ORDER BY", "", "SELECT *", "SELECT DISTINCT", "SELECT INTO", "SELECT TOP", "TRUNCATE TABLE", "UNION", "UNION ALL", "UPDATE", "WHERE");
  $selections = str_ireplace($sanitize, "", $selections);
}

$zip = $_GET['zip'];

$curl_url = 'https://api.data.world/v0/sql/ssmith2/gci-internal?query=SELECT%20*%20FROM%20gps_app_zips%0AWHERE%20zip_code%20LIKE%20%27%25' . $zip . '%25%27';

 //echo $curl_url;

if (isset($curl_url)) {
  curl_setopt_array($curl, array(
    CURLOPT_URL => $curl_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJwcm9kLXVzZXItY2xpZW50OnNzbWl0aDIiLCJpc3MiOiJhZ2VudDpzc21pdGgyOjo4NTRlM2U5Mi1lMWFmLTQwOTEtOTMyZS0yNDU4YjM2YjNkMmIiLCJpYXQiOjE1NjA0NDk3NDAsInJvbGUiOlsidXNlcl9hcGlfYWRtaW4iLCJ1c2VyX2FwaV9yZWFkIiwidXNlcl9hcGlfd3JpdGUiXSwiZ2VuZXJhbC1wdXJwb3NlIjp0cnVlLCJzYW1sIjp7fX0.uGwHSpICouUmVN-_qpBsgJuiLZRCItaAR8N40NbSpGtj5_eEQTdxZvvxpIKIQN_3zgPLRXyLTl3D5j8pAWVYJw"
    ),
  ));
}

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}

else {
  $response_array = json_decode($response, true);
	header('Content-Type: application/json');
  echo json_encode($response_array);
}
