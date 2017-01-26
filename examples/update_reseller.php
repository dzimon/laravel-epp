<?php

require __DIR__.'/autoload.php';

use LaravelEPP\Registrars\Nominets\NominetReseller;

$username = getenv('NOMINET_USERNAME');
$password = getenv('NOMINET_PASSWORD');
$host = 'epp.nominet.org.uk';

$nr = new NominetReseller();
$nr->setHost($host);
$nr->setUsername($username);
$nr->setPassword($password);


$parameters = [
  'reference' => '117419',
  'trading_name' => 'NetEarth UK Ltd',
  'url' => 'www.netearthone.co.uk',
  'email' => 'support@netearthone.com',
  'telephone' => '+44.8707707154',
];
$response = $nr->update($parameters);

var_dump($response);