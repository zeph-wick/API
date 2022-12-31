<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = false;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AatfoGA8cmCqtymxNkR8PQVjL5nGRRpW9pTrarb6G1dKyFO6IJAhmmMPXyMourUNGeqG6Y2SIwEkR_5d',
    'client_secret' => 'EFz95WkIf2bWIGNTyINuAFhGhzI1wAXrsx4wc9PkI150cAyfQ_aZKOj5rP1ae6WhDEuDlq8369YB2hFM',
    'return_url' => 'http://localhost/How-to-Integrate-PayPal-REST-API-Payment-Gateway-in-PHP-main/response.php',
    'cancel_url' => 'http://localhost/How-to-Integrate-PayPal-REST-API-Payment-Gateway-in-PHP-main/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'codeat21'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
