<?php

use LaravelEPP\Registrars\Nominets\NominetExtension;

require __DIR__.'/autoload.php';

$username = getenv('NOMINET_TEST_USERNAME');
$password = getenv('NOMINET_TEST_PASSWORD');
$host = 'testbed-epp.nominet.org.uk';

$nominetDomain = new \LaravelEPP\Registrars\Nominets\NominetDomain();
$nominetDomain->setHost($host);
$nominetDomain->setUsername($username);
$nominetDomain->setPassword($password);

$response = $nominetDomain->lockInvestigation('nominet-test111.co.uk');

print_r($response['status']);
