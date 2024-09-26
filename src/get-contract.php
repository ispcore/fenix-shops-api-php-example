<?php

require 'vendor/autoload.php';

/**
 * ⚠️ IMPORTANTE ⚠️
 * En este ejemplo vamos a hardcodear los valores de las variables.
 * En un entorno de producción, es importante que estos valores estén
 * almacenados de forma segura, por ejemplo en variables de entorno.
 */
$shopID = '<shop-id>';
$orderID = '<order-id>';
$apiKey = '<api-key>';
$orderURL = "https://fenix.tel/api/v1/shops/{$shopID}/orders/{$orderID}/contract";

$client = new GuzzleHttp\Client();

try {
  $response = $client->get($orderURL, [
    'headers' => [
      'Authorization' => 'Bearer ' . $apiKey,
      'Content-Type' => 'application/json',
    ],
  ]);
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
  exit();
}

header('Content-Type: application/json');
echo $response->getBody();
