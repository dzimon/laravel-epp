<?php

require __DIR__.'/autoload.php';

use LaravelEPP\Registrars\Nominets\NominetReseller;

$username = getenv('NOMINET_TEST_USERNAME');
$password = getenv('NOMINET_TEST_PASSWORD');
$host = 'testbed-epp.nominet.org.uk';

$nr = new NominetReseller();
$nr->setHost($host);
$nr->setUsername($username);
$nr->setPassword($password);


$parameters = [
  'reference' => '123456',
  'trading_name' => 'Test Brand',
  'url' => 'http://www.testnominet.co.uk',
  'email' => 'support@testnominet.co.uk',
  'telephone' => '+66123456789',
];
$response = $nr->create($parameters);

var_dump($response);