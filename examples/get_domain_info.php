<?php

require __DIR__.'/autoload.php';

use LaravelEPP\Registrars\Nominets\NominetDomain;

$username = getenv('NOMINET_LIVE_USERNAME');
$password = getenv('NOMINET_LIVE_PASSWORD');
$host = 'epp.nominet.org.uk';

$nd = new NominetDomain();
$nd->setHost($host);
$nd->setUsername($username);
$nd->setPassword($password);

$parameters = ['domain' => 'ssldemosite.co.uk'];
$response = $nd->info($parameters);

var_dump($response['dom']->getDomainInfo());