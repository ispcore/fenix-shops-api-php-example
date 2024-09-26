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

$htmlFileName = 'sample.html';
$pdfFileName = 'sample.pdf';
$frontPhotoName = 'front-photo.png';
$backPhotoName = 'back-photo.png';

function getFile($fileName) {
  $assetsDir = dirname(__FILE__) . '/assets';
  $filePath = "{$assetsDir}/{$fileName}";
  return fopen($filePath, 'r');
}

$client = new GuzzleHttp\Client();

try {
  /**
   * Cuando se indica el campo `multipart`, Guzzle envía la petición como
   * multipart/form-data automáticamente. No es necesario agregar el header
   * 
   * https://docs.guzzlephp.org/en/stable/request-options.html#multipart
   */
  $response = $client->post($orderURL, [
    'headers' => [
      'Authorization' => 'Bearer ' . $apiKey,
    ],
    'multipart' => [
      [
        'name' => 'document_front_photo',
        'contents' => getFile($frontPhotoName),
        'filename' => $frontPhotoName,
      ],
      [
        'name' => 'document_back_photo',
        'contents' => getFile($backPhotoName),
        'filename' => $backPhotoName,
      ],
      [
        'name' => 'signed_html',
        'contents' => getFile($htmlFileName),
        'filename' => $htmlFileName,
      ],
      [
        'name' => 'signed_pdf',
        'contents' => getFile($pdfFileName),
        'filename' => $pdfFileName,
      ]
    ],
  ]);
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
  exit();
}

header('Content-Type: application/json');
echo $response->getBody();
