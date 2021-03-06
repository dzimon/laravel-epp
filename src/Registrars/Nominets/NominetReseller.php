<?php

namespace LaravelEPP\Registrars\Nominets;

use LaravelEPP\EPP\EppClient;
use LaravelEPP\Registrars\Nominets\Nominet;

/**
 * Nominet Reseller class service
 */
class NominetReseller extends Nominet
{

    /**
     * Reference like a reseller id
     */
    private $reference;

    public function __construct($reference = '')
    {
        parent::__construct();
        $this->reference = $reference;
    }

    public function __destruct()
    {
        $this->logout();
        parent::__destruct();
    }

    /**
     * Get the value of reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @param string reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    public function makeMapper($parameters = [])
    {
      return array_merge($parameters, ['{reference}' => $this->reference]);
    }

    function create(Array $parameters)
    {
        $mappers = $this->makeMapper([
            '{trading_name}' => $parameters['trading_name'] ?? null,
            '{url}' =>  $parameters['url'] ?? null,
            '{email}' => $parameters['email'] ?? null,
            '{voice}' => $parameters['telephone'] ?? null,
        ]);

        return $this->sendRequest('create-reseller', '', $mappers, [], Nominet::RESELLER_ACCESS);
    }

    function delete()
    {
        return $this->sendRequest('delete-reseller', '', $this->makeMapper(), [], Nominet::RESELLER_ACCESS);
    }

    function info()
    {
        return $this->sendRequest('info-reseller', 'reseller:infData', $this->makeMapper(), [], Nominet::RESELLER_ACCESS);
    }

    function list()
    {
        return $this->sendRequest('list-reseller', 'reseller:listData', [], [], Nominet::RESELLER_ACCESS);
    }

    function update(Array $parameters)
    {
        $mappers = $this->makeMapper([
            '{trading_name}' => $parameters['trading_name'] ?? null,
            '{url}' =>  $parameters['url'] ?? null,
            '{email}' => $parameters['email'] ?? null,
            '{voice}' => $parameters['voice'] ?? null,
        ]);

        return $this->sendRequest('update-reseller', 'reseller:infData', $mappers, [], Nominet::RESELLER_ACCESS);
    }

    public function release(String $registrant, String $registrarTag)
    {
        $mappers = [
            '{reseller_registrant}' => $registrant,
            '{reseller_registrarTag}' => $registrarTag,
        ];
        return $this->sendRequest('release-reseller', 'r:releasePending', $mappers, [NominetExtension::STD_RELEASE]);
    }
}
