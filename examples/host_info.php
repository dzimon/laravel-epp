<?php

require __DIR__.'/autoload.php';

$username = getenv('NOMINET_LIVE_USERNAME');
$password = getenv('NOMINET_LIVE_PASSWORD');
$host = 'epp.nominet.org.uk';

$nh = new \LaravelEPP\Registrars\Nominets\NominetHost('ns1.nominet.org.uk');
$nh->setHost($host);
$nh->setUsername($username);
$nh->setPassword($password);

$response = $nh->info()->toArray();

print_r($response['dom']->getHostInfo());
