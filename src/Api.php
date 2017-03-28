<?php
namespace Riesenia\DhlMyApi;

use Salamek\PplMyApi\Api as PplApi;
use Salamek\PplMyApi\Exception\OfflineException;
use Salamek\PplMyApi\Exception\SecurityException;
use Salamek\PplMyApi\Exception\WrongDataException;

/**
 * Class Client
 *
 * @author Tomas Saghy <segy@riesenia.com>
 */
class Api extends PplApi
{
    /** @var string */
    protected $wsdl = 'https://myapi.dhlparcel.sk/MyAPI.svc?wsdl';

    /**
     * MyApi constructor
     *
     * @param null|string $username
     * @param null|string $password
     * @param null|integer $customerId
     */
    public function __construct($username = null, $password = null, $customerId = null)
    {
        if (strlen($username) > 32) {
            throw new SecurityException('Username is longer then 32 characters');
        }
        if (strlen($password) > 32) {
            throw new SecurityException('Password is longer then 32 characters');
        }

        $this->username = $username;
        $this->password = $password;
        $this->customerId = $customerId;
        $this->securedStorage = sys_get_temp_dir() . '/' . __CLASS__;

        try {
            $this->soap = new \SoapClient($this->wsdl);
        } catch (\Exception $e) {
            throw new \Exception('Failed to build soap client');
        }

        if (!$this->isHealthy()) {
            throw new OfflineException('DHL MyAPI is offline');
        }
    }
}
